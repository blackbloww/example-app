<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <section>
        <form action="{{ route('users.store') }}" method="post">
            {{-- <form action="{{ route('users.store', ['name' => 'ngungugnu']) }}" method="post"> --}}
            @csrf
            <input type="text" name="name" required placeholder="name">
            <input type="email" name="email" required placeholder="email">
            <input type="password" name="password" required placeholder="password">
            <button type="submit">Tạo mới</button>
        </form>
    </section>

    <table>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <form action="{{ route('users.update', ['id' => $user->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            {{-- <input type="hidden" name="id" value="{{ $user->id }}"> --}}
                            <input type="text" name="name" required placeholder="name"
                                value="{{ $user->name }}">
                            <input type="email" name="email" required placeholder="email"
                                value="{{ $user->email }}">
                            <input type="password" name="password" required placeholder="password">
                            <button type="submit">Cập nhật</button>

                        </form><td>
                        <form action="{{ route('users.dele', ['id' => $user->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">delete</button>
                        </form></td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
