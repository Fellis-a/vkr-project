

<div class="container">
    <div class="d-flex justify-content-between align-content-center mb-2">
        <div>

            <div class="d-flex">
                <div>
                    <div class="d-flex align-items-center ml-4">
                        <label for="paginate" class="text-nowrap mr-2 mb-0">Per Page</label>
                        <select wire:model="paginate" name="paginate" id="paginate" class="form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>

                <div>
                    <div class="d-flex align-items-center ml-4">
                        <label for="paginate" class="text-nowrap mr-2 mb-0">FilterBy specialty</label>
                        <select class="form-control form-control-sm" wire:model="selectedSpecialty">
                            <option value="">All specialty</option>
                            @foreach ($specialty as $item)
                            <option wire:key value="{{ $item->id }}">{{ $item->code }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <div class=" col-md-4">
                <input type="search" wire:model="search" class="form-control"
                    placeholder="Search by name,email,phone,or address...">
            </div>
    <div class="row">

        <table class="table">
            <thead>
              <tr>
                <th>№</th>
                <th> Название</th>
                <th class="dropdown-toggle">Специальность</th>
                <th class="dropdown-toggle">Год</th>
                <th>Преподаватель</th>
                <th>Теги</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($vkrs as $vkr)
                    <tr>
                        <td wire:key>{{ ($vkrs->currentPage() - 1)  * $vkrs->perPage() + $loop->iteration }}</td>
                        <td wire:key><a href="{{ route('vkr-single', $vkr->id) }}">{{$vkr->title}}</a></td>
                        <td wire:key>{{$vkr->specialty->code}}</td>
                        <td wire:key>{{$vkr->year}}</td>
                        <td wire:key>{{$vkr->user['name']}}</td>
                        <td wire:key>{{$vkr->tech}}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>

                    {{ $vkrs->links()}}


    </div>



</div>

    </div>




</div>
