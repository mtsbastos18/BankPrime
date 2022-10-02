var modulos = {
    4: 1.82,
    5: 2.28,
    6: 2.73,
    8: 3.64,
    9: 4.10,
    10: 4.55,
    11: 5.01,
    12: 5.46,
    13: 5.92,
    14: 6.37,
    15: 6.83,
    16: 7.28,
    17: 7.74,
    18: 8.19,
    19: 8.65,
    20: 9.10,
    22: 10.01,
    24: 10.92,
    27: 12.29,
    28: 12.74,
    31: 14.11,
    32: 14.56,
    34: 15.47,
    36: 16.38,
    38: 17.29,
    39: 17.75,
    42: 19.11,
    48: 21.84,
    52: 23.66,
    54: 24.57,
    58: 26.39,
    60: 27.30,
    64: 29.12,
    68: 30.94,
    70: 31.85,
    72: 32.76,
    76: 34.58,
    80: 36.40,
    81: 36.86,
    85: 38.68,
    96: 43.68,
    108: 49.14,
    114:51.87,
    120:54.60,
    133:60.52,
    135:61.43,
    140:63.70,
    152:69.16,
    162:73.71,
    189:86.00,
    195:88.73,
    200:91.00,
    216:98.28,
    224:101.92,
    240:109.20,
    243:110.57,
    266:121.03,
    270:122.85,
    280:127.40,
    288:131.04,
    297:135.14,
    300: 136.50,
    304: 138.32,
    324: 147.42,
    342: 155.61,
    351: 159.71,
    360: 163.80,
    378: 171.99,
    399: 181.55,
    405: 184.28,
    432: 196.56,
    456: 207.48,
    459: 208.85,
    476: 216.58,
    480: 218.40,
    486: 221.13,
    500: 227.50,
    513: 233.42,
    532: 242.06,
    540: 245.70,
    567: 257.99,
    570: 259.35,
    594: 270.27,
    600: 273.00,
    608: 276.64,
    648: 294.84,
    665: 302.58,
    684: 311.22,
    700: 318.50,
    702: 319.41,
    720: 327.60,
    756: 343.98,
    760: 345.80,
    798: 363.09,
    810: 368.55,
    840: 382.20,
    856: 389.48,
    864: 393.12,
    900: 409.50,
    912: 414.96,
    918: 417.69,
    932: 424.06,
    960: 436.80,
    1000: 455.00,
    1026: 466.83,
    1046: 475.93,
    1064: 484.12,
    1100: 500.50,
    1134: 515.97,
    1140: 518.70,
    1216: 553.28,
    1242: 565.11,
    1330: 605.15,
    1350: 614.25,
    1368: 622.44,
    1404: 638.82,
    1464: 666.12,
    1520: 691.60,
    1596: 726.18,
    1672: 760.76,
    1730: 787.15,
    1824: 829.92,
    1976: 899.08,
    2128: 968.24,
    2280: 1037.40,
    2394: 1089.27,
    2432: 1106.56,
    2528: 1150.24,
    2584: 1175.72,
    2660: 1210.30,
    2736: 1244.88,
    2794: 1271.27,
    2888: 1314.04,
    2926: 1331.33,
    3040: 1383.20,
    3192: 1452.36,
    3344: 1521.52,
    3496: 1590.68,
    3648: 1659.84,
    3800: 1729.00,
}

const fatorDivisao = 0.828667;

function simular() {
    let nome = document.getElementById('nome').value;
    let telefone = document.getElementById('telefone').value;
    let email = document.getElementById('email').value;
    let cidade = document.getElementById('cidade').value;
    let estado = document.getElementById('estado').value;
    let tipoImovel = document.getElementById('tipo-imovel').value;
    
    if (nome == "" || telefone == "" || email == "" || cidade == "" || estado == "" || tipoImovel == "") {
        alert("Preencha todos os campos");
        return;
    }

    let valorConta = document.getElementById('valor').value;
    console.log('valor conta: ' + valorConta);
    
    let valorConsumo = Math.round(valorConta / 0.85);

    if (valorConsumo > 2000) {
      let targetNome2 = document.getElementById('target-nome2')
      targetNome2.innerHTML = nome;   

      document.getElementById('whats').value = telefone;
      document.getElementById('email2').value = email;
      
      let resultado2 = document.querySelector('#secao-resultado2');

      resultado2.className += "d-block";

      resultado2.scrollIntoView({behavior: "smooth"});

      
    } else {

      let numModulos = Math.ceil((valorConta / fatorDivisao) / 55);
      console.log(numModulos);
      let indice = numModulos;
      let teste = false;

      let fatorReducao = valorConta * 0.94;
      
      let reducaoPorMes = valorConta - fatorReducao;
      let economiaAnual = ((valorConta - reducaoPorMes) * 12) * 1.10;


      let fator = economiaAnual * 25;
      let economiaVinteAnos = fator + (fator * 0.8);


//     Valor médio de gasto menos -94% de redução = Quanto passará o custo mensal do cliente usando energia solar
// Quantia mensal com energia solar x 12 meses = Economia anual
// Economia anual x 25 anos + 80% = Quanto economizará em 25 anos


      while (!teste) {
          if (!modulos[indice]) {
              indice = indice + 1;
          } else {
              teste = true;
          }
      }


      let targetNome = document.getElementById('target-nome')
      targetNome.innerHTML = nome;   
      
      let form = document.querySelector('.form-simulador');
      let resultado = document.querySelector('#secao-resultado');

      resultado.className += "d-block";

      document.getElementById('potencia').innerHTML = modulos[indice] + " kWp";
      document.getElementById('numero-modulos').innerHTML = numModulos + " módulos";
      valorConta = parseFloat( valorConta);
      console.log(valorConta.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
      document.querySelector('.grafico1 span').innerText = valorConta.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
      document.querySelector('.grafico2 span').innerText = reducaoPorMes.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
      document.querySelector('.grafico3 span').innerText = economiaAnual.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
      document.querySelector('.grafico4 span').innerText = economiaVinteAnos.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
      
      
      resultado.scrollIntoView({behavior: "smooth"});




      console.log("Modulos: " + numModulos + " potencia: " + modulos[indice] + " indice: " + indice);
    }
}

function proposta() {
    document.querySelector('#btn-envia-form').click();  
}

function proposta2 () {
  document.getElementById('email').value = document.getElementById('email2').value;

  var telefones = document.getElementById('whats').value + " / " + document.getElementById('telefone2').value

  document.getElementById('telefone').value = telefones;
  document.querySelector('#btn-envia-form').click();  
}

class Slider {
  constructor (rangeElement, valueElement, options) {
    this.rangeElement = rangeElement
    this.valueElement = valueElement
    this.options = options

    // Attach a listener to "change" event
    this.rangeElement.addEventListener('input', this.updateSlider.bind(this))
  }

  // Initialize the slider
  init() {
    this.rangeElement.setAttribute('min', options.min)
    this.rangeElement.setAttribute('max', options.max)
    this.rangeElement.value = options.cur

    this.updateSlider()
  }

  // Format the money
  asMoney(value) {
    return 'R$ ' + parseFloat(value)
      .toLocaleString('pt-BR', { maximumFractionDigits: 2 })
  }

  generateBackground(rangeElement) {   
    if (this.rangeElement.value === this.options.min) {
      return
    }

    let percentage =  (this.rangeElement.value - this.options.min) / (this.options.max - this.options.min) * 100
    return 'background: linear-gradient(to right, #00579b,#00579b ' + percentage + '%, #d3edff ' + percentage + '%, #dee1e2 100%)'
  }

  updateSlider (newValue) {
    this.valueElement.innerHTML = this.asMoney(this.rangeElement.value)
    this.rangeElement.style = this.generateBackground(this.rangeElement.value)
    document.getElementById('valor').value = this.rangeElement.value;
    let valorConsumo = Math.round(this.rangeElement.value / 0.85);
    document.getElementById('consumo-medio').innerHTML = valorConsumo + " kWh/mês";
  }

  updateSliderByInput (valor) {
    this.valueElement.innerHTML = this.asMoney(valor)
    this.rangeElement.style = this.generateBackground(valor)
    //this.rangeElement.value = valor
    document.getElementById('valor').value = valor;
    let valorConsumo = Math.round(valor / 0.85);
    document.getElementById('consumo-medio').innerHTML = valorConsumo + " kWh/mês";
  }
}

let rangeElement = document.querySelector('.range [type="range"]')
let valueElement = document.querySelector('.range .range__value span') 

let options = {
  min: 50,
  max: 70000,
  cur: 50
}
let slider = new Slider(rangeElement, valueElement, options)

if (rangeElement) {

  slider.init()
 // console.log(slider);

  
}

var rad = document.getElementsByName('forma-pagamento');
var prev = null;
for(var i = 0; i < rad.length; i++) {
    rad[i].onclick = function () {
        // (prev)? console.log(prev.value):null;
        // if(this !== prev) {
        //     prev = this;
        // }
        console.log(this.value)
        document.getElementById('forma-pagamento').value = this.value;
    };
}


document.addEventListener( 'wpcf7submit', function( event ) {
  document.getElementById('sucesso').removeAttribute('style');
  document.getElementById('sucesso2').removeAttribute('style');
  // Your code
}, false );

document.querySelector('#abrir-input').addEventListener('click',() => {
  document.querySelector('.input-valor').classList += "visible";
});

var inputValor = document.querySelector('#valor')
  inputValor.addEventListener('change',() => {
    console.log(inputValor.value)
    slider.updateSliderByInput(inputValor.value)
  });