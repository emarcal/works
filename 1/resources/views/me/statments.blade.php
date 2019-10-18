@extends('me') @section('content')
    <div class="card widget-todo-lists">
            <div class="card__header card__header--highlight">
                <h2>Statments <small></small></h2>
            </div>
            <div class="list-group">
            @if($statments->isEmpty())
            <div style="padding: 0%">
                        <div class="verify alert alert-secondary" role="alert" style="font-size:12pt;text-align:center">
                        <i class="zmdi zmdi-close-circle"></i> No notifications to show you.
                        </div>
                    </div>
            @else
                @foreach($statments as $item)
                    <div class="list-group-item">
                        <div class="checkbox checkbox--char">
                            <label>
                            
                                <span class="checkbox__helper"><i class="zmdi zmdi-comment-text"></i></span>
                                <span class="widget-todo-lists__info">
                                <?= nl2br($item->text);?>
                                    <br><br>
                                    <small> {{$item->date}}</small>
                                    <br><br>
                                </span>

                                <span class="list-group__attrs">
                                
                                </span>
                            </label>
                        </div>
                        </div>
                @endforeach
            @endif
        </div>
@endsection