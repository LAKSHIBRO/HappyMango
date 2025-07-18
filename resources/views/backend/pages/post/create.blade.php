@extends('backend.app')

@section('content')
    <div class="page-header">
        <h1 class="page-title my-auto">Create Post</h1>
        <div>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/admin/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Posts</li>
            </ol>
        </div>
    </div>
    <div class="row top-row">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Post Details</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="blogTitle" class="form-label">Blog Title</label>
                                    <input type="text" class="form-control" id="blogTitle">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="blogSlug" class="form-label">Slug (Slug Message)</label>
                                    <input type="text" class="form-control" id="blogSlug">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="shortDescription" class="form-label">Short Content</label>
                                    <textarea class="form-control" name="shortDescription" id="shortDescription" rows="5"></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="blogContent" class="form-label">Content</label>
                                    <div class="editor-content" id="blogContent"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Post Category</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="blogCategory" class="form-label">Category</label>
                                    <select class="form-select" id="blogCategory">
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Post Image</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="fileChooser" ondragover="handleDragOver(event)"
                                        ondragleave="handleDragLeave()" ondrop="handleDrop(event)">
                                        <label id="fileChooserTitlePostCover" for="postCover">
                                            Drag & Drop your file or
                                            <span><u>Browse</u></span>
                                        </label>
                                        <div class="selectedImages" id="selectedPostCover"></div>
                                        <input type="file" id="postCover"
                                            onchange="previewImage('postCover', 'fileChooserTitlePostCover')"
                                            accept="image/*" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Post Visibility</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="list-unstyled p-0 m-0">
                                        <li class="d-flex justify-content-between">
                                            <label class="form-label">Visibility</label>
                                            <div class="d-flex gap-3">
                                                <div class="d-flex align-items-center gap-2">
                                                    <input id="blogShow" type="radio" name="visibility" value="1"
                                                        checked>
                                                    <label for="blogShow" class="form-label m-0 p-0">Show</label>
                                                </div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <input id="blogHide" type="radio" name="visibility" value="0">
                                                    <label for="blogHide" class="form-label m-0 p-0">Hide</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end gap-3 mt-4 mt-xl-5">
                            <button class="w-100 btn btn-secondary" onclick="window.location='/admin/blog'">Close</button>
                            <button id="postBlog" class="w-100 btn btn-primary" onclick="createPost()">Create a
                                Post</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection