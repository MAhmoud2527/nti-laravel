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
    <br>
    @if (session()->get('Message'))
    <div class="alert alert-success">  {{ session()->get('Message') }}</div>

    @endif

  <h2>Display Subject</h2>
  <a href="{{url('/subject/create/')}}" class="btn btn-primary" > Add New Subject</a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Content</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Teacher Name</th>
        <th>Code</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $value )


      <tr>
        <td>{{++$key}}</td>
        <td>{{$value->title}}</td>
        <td>{{$value->content}}</td>
        <td>{{$value->startDate}}</td>
        <td>{{$value->endDate}}</td>
        <td>{{$value->teacherName}}</td>
        <td>{{$value->code}}</td>
        <td>
            <a href="{{ url('subject/'. $value->id . '/edit')}}" class="btn btn-primary">Edit</a>
            <a href="" data-toggle="modal" data-target="#modal_single_del_{{$value->id}}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      <div class="modal" id="modal_single_del_{{$value->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">delete confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
    </button>
                </div>

                <div class="modal-body">
                    <p> {{ 'Confirm to delete user  : '. $value->title }}</p>
                </div>
                <div class="modal-footer">
                    <form action="{{url('subject/'.$value->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <div class="not-empty-record">
                            <button type="submit" class="btn btn-primary">Delete</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      @endforeach
    </tbody>
  </table>
  {{$data->links()}}
</div>

</body>
</html>
