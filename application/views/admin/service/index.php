<style>
        div.DTE_Inline input {
        border: none;
        background-color: transparent;
        padding: 0 !important;
        font-size: 90%;
    }
 
    div.DTE_Inline input:focus {
        outline: none;
        background-color: transparent;
    }
</style>

<div class="content-wrapper" style="font-family:cambria">
<section class="content-header" style="font-family:cambria">
<h1 style="font-family:cambria">
<i class="fa fa-id-card" aria-hidden="true"></i>
      Liste des Services
      </h1>
<ol class="breadcrumb" style="font-family:cambria">

        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">SService</a></li>
        <li class="active">Liste </li>
      </ol>
    </section>
    <br>
     <div class="box-header">
        <a href="<?php echo base_url('Service/afficher')?>" class="w3-btn w3-blue w3-round">
        <button type="button" class="btn btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> Ajouter</button></a>
                <br>
        </div>
     <br><br>
   
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        

<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
                <th>First name</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Office</th>
                <th width="18%">Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
    </table>
    </div>
    </section>
    </div>
    <!-- Modal -->

<script type="text/javascript">
        var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "../php/staff.php",
        table: "#example",
        fields: [ {
                label: "First name:",
                name: "first_name"
            }, {
                label: "Last name:",
                name: "last_name"
            }, {
                label: "Position:",
                name: "position"
            }, {
                label: "Office:",
                name: "office"
            }, {
                label: "Extension:",
                name: "extn"
            }, {
                label: "Start date:",
                name: "start_date",
                type: "datetime"
            }, {
                label: "Salary:",
                name: "salary"
            }
        ]
    } );
 
    var table = $('#example').DataTable( {
        dom: "Bfrtip",
        ajax: "../php/staff.php",
        columns: [
            {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
            { data: "first_name" },
            { data: "last_name" },
            { data: "position" },
            { data: "office" },
            { data: "start_date" },
            { data: "salary", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) }
        ],
        keys: {
            columns: ':not(:first-child)',
            editor:  editor
        },
        select: {
            style:    'os',
            selector: 'td:first-child',
            blurable: true
        },
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
} );
</script>

