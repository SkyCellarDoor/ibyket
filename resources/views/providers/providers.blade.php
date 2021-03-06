@extends('skyapp.index')

@section('page_css')

    {{--<link href="{{ asset("assets/") }}/global/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{ asset("assets/") }}/global/plugins/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css" />--}}

@endsection

@section('content')

    <div class="ui top attached menu">
        <div class="item">&nbsp;Поставщики</div>
        <a class="item" onclick="new_provider()">
            <i class="plus green icon"></i>
            Добавить
        </a>
    </div>



    <div class="ui bottom attached segment">
        <table id="providers" class="ui compact selectable celled table">
            <thead>
            <tr>
                <th>Название</th>
                <th class="collapsing">Счет</th>
            </tr>
            </thead>
            <tbody>
            @foreach($providers as $provider)
                <tr>
                    <td>
                        <a href="{{ route('detail_provider') }}/{{ $provider->id }}">{{ $provider->providers_model->company }}</a>
                    </td>
                    <td nowrap>{{ $provider->bill }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    {{--модальное окно добавления поставщика--}}

    <div id="new_provider" class="ui small modal">

        <i class="close icon"></i>
        <div class="header">
            <span id="type_name">Добавление поставщика</span>
        </div>
        <div class="content">
            <form id="form_new_provider" class="ui form" action="{{ route('add_provider') }}" method="POST">
                {{ csrf_field() }}
                <div class="ui grid">
                    <div class="five wide column ">
                        <select id="type" class="dropdown field" name="type">
                            <option value="">Тип</option>
                            @foreach( $types as $type )
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="nine wide column field">
                        <div class="ui input">
                            <input id='name_company' name="name_company" value="" type="text"
                                   placeholder="Название компании">
                        </div>
                    </div>
                </div>
                <div class="ui error message"></div>
        </div>
        <div class="actions">
            <input type="submit" class="ui black deny button" value="Отмена">
            <input type="submit" class="ui ok green button" value="Добавить">
            </form>

        </div>
    </div>

    {{--модальное окно добавления поставщика--}}


@endsection


@section('page_scripts')
    {{--<script src="{{ asset("assets/") }}/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>--}}
    {{--<script src="{{ asset("assets/") }}/global/plugins/moment.min.js" type="text/javascript"></script>--}}
    {{--<script src="{{ asset("assets/") }}/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>--}}
@endsection


@section('script')
    <script>

        $('#providers').DataTable({
            "aaSorting": [],
            "lengthMenu": [[25, 50, -1], [25, 50, "Все"]],
            "language": {
                "lengthMenu": "_MENU_  &nbsp;&nbsp;записей на страницу",
                "zeroRecords": "Ничего не найдено",
                "info": "Старница _PAGE_ из _PAGES_",
                "search": "Поиск:",
                "paginate": {
                    "first": "Начало",
                    "last": "Конец",
                    "next": "Вперед",
                    "previous": "Назад"
                },
            }
        });

        function new_provider() {

            $("#new_provider").modal('show');

            $("#new_provider").modal({
                onApprove: function () {
                    $("#form_new_provider")
                        .form({
                            fields: {
                                type: {
                                    identifier: 'type',
                                    rules: [
                                        {
                                            type: 'empty',
                                            prompt: 'Выберите тип компании'
                                        }
                                    ]
                                },
                                name: {
                                    identifier: 'name_company',
                                    rules: [
                                        {
                                            type: 'empty',
                                            prompt: 'Введите название'
                                        }
                                    ]
                                },
                            }
                        });

                    if ($("#form_new_provider").form('is valid')) {
                        return true;
                    }

                    return false;
                }
            });

        }


    </script>
@endsection


