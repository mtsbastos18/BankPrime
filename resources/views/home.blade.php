@extends('layouts.master')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $processos }}</h3>

                            <p>Novas Propostas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="{{ route('propostas') }}" class="small-box-footer">
                            Ver mais <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col 
                                      <div class="col-lg-3 col-6">
                                        small card 
                                        <div class="small-box bg-success">
                                          <div class="inner">
                                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                                            <p>Bounce Rate</p>
                                          </div>
                                          <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                          </div>
                                          <a href="#" class="small-box-footer">
                                          Ver mais <i class="fas fa-arrow-circle-right"></i>
                                          </a>
                                        </div>
                                      </div>
                                      ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $emAndamento }}</h3>

                            <p>Propostas em andamento</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="{{ route('propostas') }}" class="small-box-footer">
                            Ver mais <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $finalizados }}</h3>

                            <p>Propostas finalizadas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <a href="{{ route('propostas') }}" class="small-box-footer">
                            Ver mais <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
