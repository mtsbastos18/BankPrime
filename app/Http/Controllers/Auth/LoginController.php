<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AcompanhamentoController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Comprador;
use App\Models\RelCompradorProcesso;
use DateTime;

class LoginController extends Controller
{
    /*
    
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        if ($request->tipo_acesso == 2) {
            $id = $this->loginCliente($request->all());
            if ($id) {
                return Redirect('exibe-acompanhamento-cliente/' . $id);
            }
        }
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function loginCliente($data)
    {

        $cpf = str_replace('-', '', $data['login']);
        $cpf = str_replace('.', '', $cpf);
        $cpf = $this->mask($cpf, '###.###.###-##');

        $aux = $this->mask($data['password'], '##-##-####');

        try {
            $aux = new DateTime($aux);
            $nascimento = date_format($aux, 'Y-m-d');
        } catch (\Throwable $th) {
            return null;
        }

        $compradores = Comprador::where([
            ['cpf', '=', $cpf],
            ['nascimento', '=', $nascimento],
        ])->get();

        $processos = array();

        foreach ($compradores as $c) {
            $p = RelCompradorProcesso::where([
                ['id_comprador', '=', $c['id']],
            ])->value('id_processo');
            if ($p) {
                array_push($processos, $p);
            }
        }


        if (sizeof($processos) > 0) {
            $id = json_encode($processos[0]);

            return $id;
        } else {
            exit('cu');
        }
    }

    public function username()
    {
        return 'login';
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    private function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
            if ($mask[$i] == '#') {
                if (isset($val[$k])) {
                    $maskared .= $val[$k++];
                }
            } else {
                if (isset($mask[$i])) {
                    $maskared .= $mask[$i];
                }
            }
        }

        return $maskared;
    }
}
