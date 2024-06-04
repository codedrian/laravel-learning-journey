<td class="flex justify-evenly px-6 py-4">
    <form action="{{ route('phonebook.edit') }}" method="post" name="edit-phonebook">
        @csrf
        <input name="id" type="hidden" value="{{ $contact->id }}">
        <input type="submit" class="edit-contact no-underline text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600
        hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" value="Edit">
    </form>

    <form action="{{ route('phonebook.destroy') }}" method="post" name="destroy-contact">
        @csrf
        @method('DELETE')
        <input name="id" type="hidden" value="{{ $contact->id }}">
        <input type="submit" class="delete-contact no-underline text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4
    focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" value="Delete" id="confirm-delete">
    </form>
</td>
