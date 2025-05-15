@extends('layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="title mb-4">
                    <h2>Список пользователей</h2>
                    <a href="{{ url('user/create') }}" class="btn btn-success mb-3">Добавить нового пользователя</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Имя пользователя</th>
                            <th>Email</th>
                            <th>Администратор</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->isadmin)
                                        <span class="badge bg-success">Да</span>
                                    @else
                                        <span class="badge bg-secondary">Нет</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a href="{{ url('user/edit/'.$user->id) }}" class="btn btn-primary btn-sm me-2">
                                        <i class="fa fa-edit"></i> Редактировать
                                    </a>
                                    <a href="{{ url('user/destroy/'.$user->id) }}"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Вы уверены, что хотите удалить этого пользователя?')">
                                        <i class="fa fa-trash"></i> Удалить
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
