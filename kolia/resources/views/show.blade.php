
<!DOCTYPE html>
<html>
        <head>
            <title></title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

        </head>
    <body>
        <table>
        <tr>
            <th>name</th>
            <th>description</th>
            <th>file</th>
            <th>view</th>
            <th>download</th>
        </tr>
       @foreach ($data as $data)
       <tr>
        <td>{{$data->name}}</td>
        <td>{{$data->description}}</td>
        <td>{{$data->file}}</td>
        <td>
            @if($data->photo)
            <img src="{{asset('../storage/app/public/storage/'.$data->photo)}}" height="50" >
            @else
            <p> No photo</p>
            @endif</td>

     
        <td><a href="{{url('/view',$data->id)}}">view</a></td>
        <td><a href="{{url('/download',$data->file)}}">download</a></td>
        </tr>
       @endforeach
    </table>
    </body>
</html>
