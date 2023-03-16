var i = 0;
$('#add').click(function () {
    ++i;
    $('#table').append(
        `
        <tr class="flex justify-between items-center">
            <td class="flex flex-start w-48"><input type="text" name="description[`+i+`][description]" class="border-grey border-2 rounded w-30"></td>
            <td class="flex flex-start w-16"><input type="text" name="length[`+i+`][length]" class="border-grey border-2 rounded w-full"></td>
            <td class="flex flex-start w-16"><input type="text" name="width[`+i+`][width]" class="border-grey border-2 rounded w-full"></td>
            <td class="flex flex-start w-16"><input type="text" name="height[`+i+`][height]" class="border-grey border-2 rounded w-full"></td>
            <td class="flex flex-start w-16"><input type="number" min="1" value="1" name="quantity[`+i+`][quantity]"
            class="border-grey border-2 rounded w-full"></td>
            <td class="flex flex-start w-16 justify-center items-center remove-row"><button type="button" class="bg-neutral-500 rounded-full text-white w-6 h-6">X</button></td>
        </tr>
        `
    );
});

$(document).on('click', 'remove-row', function(){
    $(this).partents('tr').remove();
});