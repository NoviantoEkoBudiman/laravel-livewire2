<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <button data-toggle="modal" data-target="#responsive-modal" class="btn btn-primary">
                            Add Hotel
                        </button>
                        <!-- Modal -->
                        <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Modal Content is Responsive</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            @if ($errors->any())
                                                <div class="pt-3" id="error-messages">
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="form-body">
                                                <div class="card-body">
                                                    <div class="row p-t-20">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Name</label>
                                                                <input type="text" class="form-control" wire:model="name">
                                                                {{-- @error('name')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror --}}
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group has-danger">
                                                                <label class="control-label">Address</label>
                                                                <input type="text" class="form-control" wire:model="address">
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group has-success">
                                                                <label class="control-label">Phone</label>
                                                                <input type="text" class="form-control" wire:model="phone">
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label>
                                                                <input type="email" class="form-control" wire:model="email">
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Check In Time</label>
                                                                <input type="time" class="form-control" wire:model="check_in_time">
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Check Out Time</label>
                                                                <input type="time" class="form-control" wire:model="check_out_time">
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <!--/row-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Stars</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" wire:model="stars" type="radio" value="1">
                                                                <label class="form-check-label">
                                                                  Star 1
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" wire:model="stars" type="radio" value="2">
                                                                <label class="form-check-label">
                                                                    Star 2
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" wire:model="stars" type="radio" value="3">
                                                                <label class="form-check-label">
                                                                    Star 3
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" wire:model="stars" type="radio" value="4">
                                                                <label class="form-check-label">
                                                                    Star 4
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" wire:model="stars" type="radio" value="5">
                                                                <label class="form-check-label">
                                                                    Star 5
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                </div>
                                                <div class="form-actions">
                                                    <div class="card-body">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" wire:click="closeModal()">Close</button>
                                                        @if ($update_status == false)
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="store()">Simpan</button>
                                                        @else
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="update()">Update</button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal Delete --}}
                        <div id="modalDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure want to delete this data?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger waves-effect" wire:click="delete()" data-dismiss="modal">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal Delete --}}
                    </h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Stars</th>
                                <th scope="col">Check In Time</th>
                                <th scope="col">Check Out Time</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hotels as $hotel)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $hotel->name }}</td>
                                    <td>{{ $hotel->address }}</td>
                                    <td>{{ $hotel->phone }}</td>
                                    <td>{{ $hotel->email }}</td>
                                    <td>{{ $hotel->stars }}</td>
                                    <td>{{ date("H:i",strtotime($hotel->check_in_time)) }}</td>
                                    <td>{{ date("H:i",strtotime($hotel->check_out_time)) }}</td>
                                    <td>
                                        <button data-toggle="modal" wire:click="edit({{ $hotel->id }})" data-target="#responsive-modal" class="btn btn-warning">
                                            Edit
                                        </button>
                                        <button data-toggle="modal" wire:click="setId({{ $hotel->id }})" data-target="#modalDelete" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('open-modal', event => {
            var myModal = new bootstrap.Modal(document.getElementById('responsive-modal'));
            myModal.show();
        });
    
        window.addEventListener('close-modal', event => {
            document.getElementById("error-messages").remove();
            var myModal = new bootstrap.Modal(document.getElementById('responsive-modal'));
            myModal.hide();
        });

        window.addEventListener('alert', event => {
            Swal.fire(event.detail.message);
        });
    </script>
</div>