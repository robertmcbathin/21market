<div class="row">
    <div class="col-lg-6 phone-holder">
        <p> <i class="fa fa-phone"></i>
            (8352) 21-33-77
            <button class="btn btn-primary" data-toggle="modal" data-target="#order-call">Заказать обратный звонок!</button>
        </p>
    </div>
    @if (Auth::user())
    <div class="modal fade" tabindex="-1" role="dialog" id="order-call">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Закажите обратный звонок!</h4>
                </div>
                <form action="{{route('modals.callbyuser.post')}}" method="POST">
                <div class="modal-body">
                        <div class="form-group {{ $errors->
                            has('message') ? 'has-error' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="message">Сообщение</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="message" name="message" required="required" class="form-control col-md-9 col-xs-12" size="255" maxlength="255" placeholder="Введите Ваше сообщение"></div>
                        </div>
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                        {{csrf_field()}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content --> </div>
        <!-- /.modal-dialog --> </div>
    @else
    <div class="modal fade" tabindex="-1" role="dialog" id="order-call">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Закажите обратный звонок!</h4>
                </div>
                <form action="{{route('modals.call.post')}}" method="POST">
                <div class="modal-body">
                    <div class="form-group {{ $errors->
                            has('phone') ? 'has-error' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Номер телефона</label>
                            <div class="col-md-9 col-sm-6 col-xs-12">
                                <input type="text" id="phone" name="phone" required="required" class="form-control col-md-9 col-xs-12" size="15" maxlength="15" placeholder="Введите Ваш номер телефона"></div>
                        </div>
                        <div class="form-group {{ $errors->
                            has('message') ? 'has-error' : ''}}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="message">Сообщение</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" id="message" name="message" required="required" class="form-control col-md-9 col-xs-12" size="255" maxlength="255" placeholder="Введите Ваше сообщение"></div>
                        </div>
                        {{csrf_field()}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content --> </div>
        <!-- /.modal-dialog --> </div>
    @endif

    <!-- /.modal -->
    <div class="col-lg-6">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Поиск товара...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button"> <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </div>
</div>