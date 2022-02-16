<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          All Category
          <b class="float-right"> Total Category
            <span class="badge badge-danger text-dark">
            </span>
        </b>
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">

                    <div class="col-sm-8">
                        <div class="card shadow">
                            <div class="card-header">
                                <h4>Add Category</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('update/category/'.$category->id)}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                      <label for="exampleInputEmail1">Category Name</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" name="category_name" value="{{$category->category_name}}">

                                      @error('category_name')
                                            <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                    </div>


                                    <button type="submit" class="btn btn-primary">Update Category</button>
                                  </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

