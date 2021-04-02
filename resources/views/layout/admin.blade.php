<!DOCTYPE html>
<html>
    <head>
        <title>{{ isset($title) ? $title : 'Admin Page'  }}</title>
    </head>
    <body>
        <h1>{{ isset($title) ? $title : 'Admin Page'  }}</h1>
        <table>
            <tr>
                <td>Menu: </td>
                <td><a href="/admin/sales">Sales</a></td>
                <td>|</td>
                <td><a href="/admin/cars">Cars</a></td>
                <td>|</td>
                <td><a href="/logout">Logout</a></td>
            </tr>
        </table>
        <br>
        <br>
        @yield('content')
    </body>
</html>