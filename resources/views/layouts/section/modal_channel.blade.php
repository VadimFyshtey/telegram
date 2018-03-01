<div class="modal fade" id="myModal_channel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Добавление канала</h4>
            </div>
            <div id="load"></div>
            <br/>
            <div class="help">
                <p>Помощь:</p>
                <ul>
                    <li>Образец ссылки: https://t.me/rap_american или @business_facts</li>
                    <li>Два раза один канал не добавиться</li>
                </ul>
            </div>
            <div class="col-lg-12">

                <div class="myerror">
                    @isset($errors)
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    @endisset
                </div>
            </div>

            <div class="modal-body">
                <form action="{{ route('add_channel') }}" method="post" id="addChannelForm">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="channel">Ссылка на канал:</label>
                        <input name="url" type="text" class="form-control" id="channel" placeholder="https://t.me/rap_american или @business_facts" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Категория: </label>
                        <select name="category" id="category">
                            @if(isset($data['category']))
                                @foreach( $data['category'] as $categ)
                                    <option value="{{ $categ['id'] }}">{{ $categ['name'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button type="submit" id="submitChannel" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>