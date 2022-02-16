<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          All Category
          <b class="float-right"> Total Category
            <span class="badge badge-danger text-dark">
                {{count($category)}}
            </span>
        </b>
        </h2>

    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        <div class="card shadow">
                            <div class="card-header">
                                <h4>All Category</h4>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Created At</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @php($i =1) --}}

                                        @foreach ($category as $cat)
                                        <tr>
                                            <td>{{$category->firstItem()+$loop->index}}</td>
                                            <td>{{$cat->category_name}}</td>
                                            <td>{{$cat->user->name}}</td>
                                            <td>
                                                @if ($cat->created_at==NULL)
                                                    <span class="text-danger">Date not Found</span>

                                                    @else {{$cat->created_at->diffForHumans()}}
                                                @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('edit/category/' .$cat->id) }}" class="btn btn-sm btn-success">Edit</a>
                                                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                                                </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                  </table>
                                  {{$category->links()}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card shadow">
                            <div class="card-header">
                                <h4>Add Category</h4>
                            </div>
                            <div class="card-body">


                                <form action="{{ route('add.category')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                      <label for="exampleInputEmail1">Category Name</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" name="category_name">

                                      @error('category_name')
                                            <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                    </div>


                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
           {{--  Recycle Bin Area --}}

           <div class="container mt-3">
            <div class="row">
                <div class="col-sm-8">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    <div class="card shadow">
                        <div class="card-header">
                            <h4>Recycle Bin</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created At</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i =1) --}}
                                    @foreach ($trash as $tr)
                                    <tr>
                                        <td>{{$trash->firstItem()+$loop->index}}</td>
                                        <td>{{$tr->category_name}}</td>
                                        <td>{{$tr->user->name}}</td>
                                        <td>
                                            @if ($tr->created_at==NULL)
                                                <span class="text-danger">Date not Found</span>

                                                @else {{$tr->created_at->diffForHumans()}}
                                            @endif
                                            </td>
                                            <td>
                                                <a href="{{url('pdelete/category/' .$cat->id) }}" class="btn btn-sm btn-success">Restore</a>
                                                <a href="{{url('softdelete/category/' .$tr->id) }}" class="btn btn-sm btn-danger">Delete perm</a>
                                            </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                              </table>
                              {{$trash->links()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>
</x-app-layout>

