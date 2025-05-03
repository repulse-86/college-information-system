<div class="overflow-x-auto shadow-md rounded-lg border border-gray-300 bg-white">
    <table class="min-w-full text-left text-sm text-gray-500">
        <thead class="">
            <tr>
                @foreach($columns as $column)
                    <th scope="col" class="px-6 py-3 text-lg font-medium text-gray-700">
                        {{ strToUpper($column) }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($rows as $row)
                <tr class="border-b">
                    @foreach($columns as $column)
                        <td class="px-6 py-4">
                            {{ $row[$column] ?? 'N/A' }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
