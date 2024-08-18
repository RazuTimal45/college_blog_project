@section('css')
    <style>
        /* DataTable styling */
        #myTable_wrapper {
            padding: 20px; /* Add some padding around the DataTable */
        }

        .dataTables_filter {
            text-align: right;
        }

        .dataTables_filter label {
            margin-bottom: 0;
        }

        .dataTables_filter input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 200px; /* Adjust the width as needed */
        }

        .dataTables_paginate {
            margin-top: 10px;
            text-align: right;
        }

        .dataTables_paginate a {
            margin: 0 5px;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            color: #333;
            transition: background-color 0.3s;
        }

        .dataTables_paginate a:hover {
            background-color: #f2f2f2;
        }

        /* Add a box shadow to the table */
        #myTable {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        @media print {
            img {
                display: block !important;
            }
        }
    </style>
@endsection
