@yield('css')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


<style>
    /* Transition for smooth sidebar open/close */
    #sidebar {
        transition: transform 0.3s ease-in-out;
    }
            
    table.dataTable thead th {
      /* border-bottom: none; Removes bottom border on header */
      border-bottom: 1.5px solid #dde1ef;
    }
    /* Pagination button default style */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      padding: 0.5rem 1rem;
      margin: 0.25rem;
      border-radius: 0.375rem;
      color: #4a5568; /* Gray-700 */
      background-color: #edf2f7; /* Gray-100 */
      border: 1px solid #cbd5e0; /* Gray-300 */
    }

    /* Hover effect for pagination buttons */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background-color: #cbd5e0; /* Gray-300 */
      color: #a0aec0; /* Gray-800 */
    }

    /* Active page button style */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      background-color: #3b82f6; /* Blue-500 */
      color: #3b82f6;
      border: 1px solid #3b82f6;
    }

    /* Disabled buttons */
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
      color: #a0aec0; /* Gray-400 */
      background-color: #edf2f7; /* Gray-100 */
      border: 1px solid #cbd5e0; /* Gray-300 */
    }

    /*Add padding to bottom border */
    table.dataTable.no-footer {
      border-bottom: 1.5px solid #dde1ef;
      /*border-b-1 border-gray-300*/
      margin-top: 0.75em;
      margin-bottom: 0.75em;
    }

    .dataTable tbody tr:nth-child(odd) {
        background-color: rgba(15,17,20,0.03); /* Light gray */
    }
    .dataTable tbody tr:nth-child(even) {
        background-color: #ffffff; /* White */
    }

    /* Hover effect */
    .dataTable tbody tr:hover {
        background-color: #e2e8fJ; /* Light blue-gray */
    }

</style>