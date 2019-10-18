@extends('me') @section('content')
<div class="content__header">
                    <h2><i class="zmdi zmdi-balance-wallet"> </i> Wallet</h2>

                    <div class="actions">
                        <a href=""><i class="zmdi zmdi-refresh"></i></a>
                       
                    </div>
                </div>

                <div class="card">
                    <div class="card__header">
                        <h2>Tokens <small>Lorem ipsum dolor sit amet, solum adipiscing mei ea. Summo civibus vis ea, eam nostro iisque efficiantur at. Ei mei justo iudico comprehensam.</small></h2>
                    </div>
                    <!-- Aditional Css Table -->
                    <style>.table-striped{width:100%;}.table-striped td{padding:10px 5px;}.table-striped th{padding:10px 5px;}.zmdi{margin-right:5px;}</style>
                    <div class="card__body">
                        <div class="table-responsive">
                            <table  class="table-striped">
                                <thead>
                                    <tr>
                                        <th  width="10%">Token</th>
                                        <th  width="40%"></th>
                                        <th  width="30%">Balance</th>
                                        <th  width="20%" text-align="center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection