<div>
    <div>
        <a href="{{ route('create-level') }}" class="btn btn-success">Create Level</a>

        @if (count(Auth::user()->kycLevels()->get()) > 0)
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Steps</th>
                            <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                            <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created By</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( Auth::user()->kycLevels()->get() as $level )
                        <tr>
                            <td class="align-middle text-center">{{$level->level_name}}</td>
                            <td class="align-middle text-center">
                                @foreach ($level->id_types as $type )
                                    <span>{{$type}}, </span>
                                @endforeach
                            </td>
                            <td class="align-middle text-center">{{ $level->created_at }}</td>
                            <td class="align-middle text-center">{{ Auth::user()->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
