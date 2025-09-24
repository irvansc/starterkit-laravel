@extends('back.layouts.pages-layouts')

@section('pageTitle', 'profile ' . $user->name)

@section('pageHeader')
<div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
        <h4 class="page-title mb-0 font-size-18">Profile {{ $user->name }}</h4>

        <div class="page-title-right">
            @include('components.breadcrumbs')
        </div>

    </div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="profile-widgets py-3">

                    <div class="text-center">
                        <div class="">
                            <img src="{{ $user->image }}" alt="" class="avatar-lg mx-auto img-thumbnail rounded-circle">
                            <style>
                                .profile {
                                    position: absolute;
                                    top: 50px;
                                    right: 0;
                                    left: 75px;
                                }

                                .edit-icon i {
                                    font-size: 16px;
                                }

                                .label-text::after {
                                    content: ":";
                                    margin-left: .25rem;
                                }
                            </style>
                        </div>

                        <div class="mt-3 ">
                            <a href="#" class="text-reset fw-medium font-size-16">{{ $user->name }}</a>
                            <p class="text-body mt-1 mb-1">{{ $user->roles->first()->name
                                }}</p>
                        </div>



                        <div class="mt-4">

                            <ui class="list-inline social-source-list">
                                <li class="list-inline-item">
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle">
                                            <a href="{{ $user->fb }}" class="text-reset">
                                                <i class="mdi mdi-facebook"></i>
                                            </a>
                                        </span>
                                    </div>
                                </li>

                                <li class="list-inline-item">
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-info">
                                            <a href="{{ $user->tw }}" class="text-reset">
                                                <i class='bx bxl-twitter'></i>
                                            </a>
                                        </span>
                                    </div>
                                </li>

                                <li class="list-inline-item">
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-black">
                                            <a href="{{ $user->tik }}" class="text-reset">
                                                <i class='bx bxl-tiktok'></i>
                                            </a>
                                        </span>
                                    </div>
                                </li>

                                <li class="list-inline-item">
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-pink">
                                            <a href="{{ $user->ig }}" class="text-reset">
                                                <i class='bx bxl-instagram'></i>
                                            </a>
                                        </span>
                                    </div>
                                </li>
                            </ui>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Personal Information</h5>

                <p class="card-title-desc">
                    {{ $user->bio }}
                </p>

                <div class="mt-3">
                    <p class="font-size-12 text-muted mb-1">Email Address</p>
                    <h6 class="">{{ $user->email }}</h6>
                </div>

                <div class="mt-3">
                    <p class="font-size-12 text-muted mb-1">Phone number</p>
                    <h6 class="">{{ $user->telp }}</h6>
                </div>

                <div class="mt-3">
                    <p class="font-size-12 text-muted mb-1"> Address</p>
                    <h6 class="">{{ $user->alamat }}</h6>
                </div>

            </div>
        </div>

    </div>

    <div class="col-md-12 col-xl-9">
        @if ($user->can('create post'))
        <div class="row">
            <div class="col-md-12 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <p class="mb-2">Total artikel publish</p>
                                <h4 class="mb-0">{{ $publishedCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <p class="mb-2">Total artikel draft</p>
                                <h4 class="mb-0">{{ $draftCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="card">
            <div class="card-body">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#experience" role="tab"
                            aria-selected="true">
                            <span class="d-block d-sm-none"><i class="fas fa-user"></i></span>
                            <span class="d-none d-sm-block">Personal details</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active show" id="experience" role="tabpanel">
                        <style>
                            .user-detail {
                                display: flex;
                                flex-direction: column;
                                gap: 0.5rem;
                            }

                            .detail-row {
                                display: flex;
                                flex-wrap: wrap;
                                padding: 0.5rem 0;
                                border-bottom: 1px solid #e9ecef;
                            }

                            .detail-row:last-child {
                                border-bottom: none;
                            }

                            .detail-row .label {
                                flex: 0 0 200px;
                                /* lebar tetap untuk label di desktop */
                                font-weight: 600;
                            }

                            .detail-row .value {
                                flex: 1;
                            }

                            @media (max-width: 768px) {
                                .detail-row .label {
                                    flex: 0 0 100%;
                                    margin-bottom: 0.25rem;
                                }

                                .detail-row .value {
                                    flex: 0 0 100%;
                                }
                            }
                        </style>


                        <div class="user-detail">
                            <div class="detail-row">
                                <div class="label">Nama Lengkap</div>
                                <div class="value">: {{$user->name}}

                                </div>
                            </div>
                            <div class="detail-row">
                                <div class="label">Username</div>
                                <div class="value">: {{$user->username}}

                                </div>
                            </div>
                            <div class="detail-row">
                                <div class="label">Email</div>
                                <div class="value">: {{ $user->email }}

                                </div>
                            </div>
                            <div class="detail-row">
                                <div class="label">No. HP/WA</div>
                                <div class="value">: {{
                                    $user->telp
                                    }}

                                </div>
                            </div>
                            <div class="detail-row">
                                <div class="label">Alamat</div>
                                <div class="value">: {{$user->alamat}}

                                </div>
                            </div>
                            <div class="detail-row">
                                <div class="label">Tempat Lahir</div>
                                <div class="value">: {{$user->tmp_lahir}}

                                </div>
                            </div>
                            <div class="detail-row">
                                <div class="label">Tanggal Lahir</div>
                                <div class="value">: @if($user->tgl_lahir)
                                    {{$user->tgl_lahir->isoFormat('dddd, D MMMM Y')}}


                                    @else Tidak diketahui @endif </div>
                            </div>
                            <div class="detail-row">
                                <div class="label">Jenis Kelamin</div>
                                <div class="value">: {{$user->jenis_kelamin =='L' ? 'Laki-laki': 'Perempuan'}}


                                </div>
                            </div>
                            <div class="detail-row">
                                <div class="label">Bio</div>
                                <div class="value">:
                                    {{$user->bio}}

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>@if ($user->can('create post')) <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Article</h4>
            <div class="table-responsive">
                <table class="table table-centered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Views</th>
                            <th scope="col" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>@forelse ($articles as $index => $article) <tr>
                            <td> {
                                {
                                $index +1
                                }
                                }

                            </td>
                            <td> {
                                {
                                $article->post_title
                                }
                                }

                            </td>
                            <td> {
                                {
                                $article->created_at
                                }
                                }

                            </td>
                            <td> {
                                {
                                $article->views->count()
                                }
                                }

                            </td>
                            <td><a href="{{ route('posts.edit-posts', ['post_id'=>$article->id]) }}"
                                    class="btn btn-primary">Edit</a></td>
                        </tr>@empty <tr>
                            <td colspan="5" class="text-center text-danger">No data</td>
                        </tr>@endforelse </tbody>
                </table>
            </div>
            <div class="mt-3"> {
                {
                $articles->links('vendor.pagination.bootstrap-4')
                }
                }

            </div>
        </div>
    </div>@endif
</div>
</div>@endsection