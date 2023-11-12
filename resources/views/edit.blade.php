<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{background-color:lightslategray}
        .card{
            width:600px;
            background-color:#fff;
            border:none;
            border-radius: 12px
        }
            .form-control{
                margin-top: 10px;
                height: 48px;
                border: 2px solid #eee;
                border-radius: 10px
            }
            .form-control:focus{
                box-shadow: none;
                border: 2px solid #039BE5
            }
            .agree-text{
                font-size: 12px
            }
            .terms{
                font-size: 12px;
                text-decoration: none;
                color: #039BE5
            }
            .button{
                margin: auto;
            }
            .confirm-button{
                height: 50px;
                width: 100px;
                border-radius: 20px;
                margin-left: 10px;
            }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5 d-flex justify-content-center">
        <div class="card px-1 py-4">
            <div class="card-body">
                <div class="nav navbar-light mb-2">
                    <a class="navbar-brand" href="#">
                        <img
                        src="{{ asset('assets/images/notes.png') }}"
                        alt="Logo"
                        width="40"
                        height="40"
                        class="d-inline-block align-text-center ms-4"
                      />
                      <b class="ms-1">My Notes</b>
                    </a>
                </div>
                <form action="{{ url('/', $note->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Judul" name="title" value="{{ $note->title }}"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group"> 
                                    <textarea class="form-control" name="content" id="" cols="30" rows="10" placeholder="Content">{{ $note->content }}</textarea>
                            </div>
                        </div>
                        </div>
                        <div class="button">
                        </div>
                        <button class="btn btn-primary btn-block confirm-button" type="submit">Confirm</button>
                    </form>
                        <form action="{{ url('/', $note->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn block confirm-button" type="submit">Delete</button>
                        </form>
                    </div>
                
            </div>
        </div>
    </div>
</body>
</html>