var i = 0;
$('#add').click(function () {
    ++i;
    $('#table').append(
        `
        <tr class="flex justify-between items-center mt-2">
            <td class="flex flex-start w-48"><input type="text" name="inputs[`+i+`][description]" class="border-grey border-2 rounded w-30  @error('inputs[`+i+`][description]')  @enderror" placeholder="in cm"></td>
            <td class="flex flex-start w-16"><input type="text" name="inputs[`+i+`][length]" class="border-grey border-2 rounded w-full @error('inputs[`+i+`][length]')  @enderror" placeholder="in cm"></td>
            <td class="flex flex-start w-16"><input type="text" name="inputs[`+i+`][width]" class="border-grey border-2 rounded w-full @error('inputs[`+i+`][width]')  @enderror" placeholder="in cm"></td>
            <td class="flex flex-start w-16"><input type="text" name="inputs[`+i+`][height]" class="border-grey border-2 rounded w-full @error('inputs[`+i+`][height]')  @enderror" placeholder="in cm"></td>
            <td class="flex flex-start w-16"><input type="text" name="inputs[`+i+`][weight]" class="border-grey border-2 rounded w-full @error('inputs[`+i+`][weight]')  @enderror" placeholder="in kg"></td>

            <td class="flex flex-start w-16 justify-center items-center"><button type="button" class="remove-row bg-neutral-500 rounded-full text-white w-6 h-6">X</button></td>
        </tr>
        `
    );
});

$(document).on('click', '.remove-row', function(){
    $(this).parents('tr').remove();
});