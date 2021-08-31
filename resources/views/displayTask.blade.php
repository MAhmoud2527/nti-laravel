<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Display users</h2>
  <a href="{{url('addtask')}}" class="btn btn-primary" > Add New Task</a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Content</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $value )


      <tr>
        <td>{{++$key}}</td>
        <td>{{$value->name}}</td>
        <td>{{$value->content}}</td>
        <td>{{$value->startDate}}</td>
        <td>{{$value->endDate}}</td>
        <td>
            <a href="{{ url('edit/'. $value->id)}}" class="btn btn-primary">Edit</a>
            <a href="{{ url('destory/'. $value->id)}}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
