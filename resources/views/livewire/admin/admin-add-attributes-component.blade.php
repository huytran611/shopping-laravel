<div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-md-6">
                            Add New Attribute
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.attributes')}}" class="btn btn-success pull-right">All Attributes</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <form action="" class="form-horizontal" wire:submit.prevent="storeAttribute">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Attribute Name</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Attribute Name" class="form-control input-md" wire:model="name">
                                @error('name') <p class="text-danger">{{$message}}</p>@enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                               <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
