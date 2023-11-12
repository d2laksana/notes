<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="page-content container note-has-grid">
        <nav class="navbar navbar-expand-md bg-light navbar-light rounded mb-3 d-flex">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/notes.png') }}" alt="Logo" width="40" height="40"
                    class="d-inline-block align-text-center ms-4" />
                <b class="ms-1">My Notes</b>
            </a>
            <button id="nav-toggle-button" class="navbar-toggler collapsed navbar-dark" type="button"
                data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarsExample04">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="javascript:void(0)" class="nav-link  px-2 px-md-3 mr-0 mr-md-2"
                            id="all-category">All Notes<i class="icon-layers mr-1"></i><span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link  px-2 px-md-3 mr-0 mr-md-2"
                            id="note-business">Business</a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link  px-2 px-md-3 mr-0 mr-md-2"
                            id="note-social">Social</a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link  px-2 px-md-3 mr-0 mr-md-2"
                            id="note-important">Important</a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="btn btn-success rounded-pill" id="add-notes">Add Notes</a>
                    </li>
                </ul>
                <div class="nav-item dropdown">
                    <div class="nav-link  px-2 px-md-3 mr-0 mr-md-2">
                    <a class="dropdown-toggle " href="#"
                        id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                    </a>
                    <div class="dropdown-menu " aria-labelledby="dropdown04">
                        <div class="ml-4 mr-4">
                            <h6>{{ session("name") }}</h6>
                            <h6>{{ session("email") }}</h6>
                        </div>
                        <a class="dropdown-item text-danger" href="/logout">Log Out</a>
                    </div>
                </div>
            </div>
            </div>
        </nav>
        <div class="tab-content bg-transparent">
            <div id="note-full-container" class="note-has-grid row">
                @foreach($notes as $item)
                <div class="col-md-4 single-note-item all-category note-social">
                    <div class="card card-body">
                        <span class="side-stick"></span>
                        <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Give salary to employee">{{
                            Str::limit($item->title, '15', '...') }}<i class="point fa fa-circle ml-1 font-10"></i></h5>
                        <p class="note-date font-12 text-muted">{{ $item->created_at->format('d M Y') }}</p>
                        <div class="note-content">
                            <p class="note-inner-content text-muted"
                                data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                {!! Str::limit($item->content, '30', '...') !!}</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="mr-1"><i class="fa fa-star favourite-note"></i></span>
                            <span class="mr-1"><i class="fa fa-trash remove-note"></i></span>
                            <a href="{{ url('/', $item->id) }}" class="card-link">view</a>
                            <div class="ml-auto">
                                <div class="category-selector btn-group">
                                    <a class="nav-link dropdown-toggle category-dropdown label-group p-0"
                                        data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                        aria-expanded="true">
                                        <div class="category">
                                            <div class="category-business"></div>
                                            <div class="category-social"></div>
                                            <div class="category-important"></div>
                                            <span class="more-options text-dark"><i
                                                    class="icon-options-vertical"></i></span>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right category-menu">
                                        <a class="note-business badge-group-item badge-business dropdown-item position-relative category-business text-success"
                                            href="javascript:void(0);">
                                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>Business
                                        </a>
                                        <a class="note-social badge-group-item badge-social dropdown-item position-relative category-social text-info"
                                            href="javascript:void(0);">
                                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Social
                                        </a>
                                        <a class="note-important badge-group-item badge-important dropdown-item position-relative category-important text-danger"
                                            href="javascript:void(0);">
                                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Important
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Modal Add notes -->
        <div class="modal fade" id="addnotesmodal" tabindex="-1" role="dialog" aria-labelledby="addnotesmodalTitle"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title text-white">Add Notes</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="notes-box">
                            <div class="notes-content">
                                <form action="/store" method="POST" id="addnotesmodalTitle">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="note-title">
                                                <label>Note Title</label>
                                                <input type="text" id="note-has-title" name="title" class="form-control"
                                                    minlength="25" placeholder="Title" />
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="note-description">
                                                <label>Note Description</label>
                                                <textarea id="note-has-description" name="content" class="form-control"
                                                    minlength="60" placeholder="Description" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-n-save" class="float-left btn btn-success" style="display: none;">Save</button>
                        <button class="btn btn-danger" data-dismiss="modal">Discard</button>
                        <button id="btn-n-add" class="btn btn-info" disabled="disabled">Add</button>
                    </div>
                </div>
            </div>
        </div>
    
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/assets/js/notes.js') }}"></script>
</body>

</html>