/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var datatable = $('#tenantTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    order: [[0, "asc"]]
});