
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">SL.</th>
            <th scope="col">Group Name</th>
            <th scope="col">Total</th>
            <th scope="col">Show</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($groups as $key => $group)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $group->name }}</td>
                <td>{{ $group->number_of_contacts }}</td>
                <td>
                    <a href="{{ route('file.group.contacts', $group->id) }}" class="btn btn-primary" target="_blank">Show</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
