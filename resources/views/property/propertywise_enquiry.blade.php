@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Property Enquiry</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Title</th>
                                            <th>Address</th>
                                            <th>Enquiry Count</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($property as $property)
                                        <tr>
                                            <td><?php echo "$i"; $i++; ?></td>
                                            <td>{{ $property->title}}</td>
                                            <td>{{ $property->short_address}}</td>
                                            <td>{{ $property->propertyenquiries->count() }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="addMore" title="Show Enquiry">
                                                        <a href="#" class="btn btn-primary btn-sm show-enquiry"
                                                            data-toggle="modal" data-target="#enquiryModal"
                                                            data-property-id="{{ $property->id }}"
                                                            style="padding: 2px 7px;"><i class="fa fa-eye"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add this code within your Blade file -->
<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enquiryModalLabel">Property Enquiries</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive"> <!-- Use the table-responsive class for responsiveness -->
                    <table id="cityTable" class="table table-hover">
                        <thead>
                            <tr>
                                 <th>Id</th> 
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <!-- Add additional table headers here -->
                            </tr>
                        </thead>
                        <tbody id="enquiriesList">
                            <!-- Enquiries will be displayed here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    // Handle the "Show Enquiry" button click
    $('.show-enquiry').click(function() {
        // Get the property ID from the data attribute
        var propertyId = $(this).data('property-id');
        // Send an AJAX request to fetch property enquiries
        $.get('/property_enquiry/' + propertyId, function(enquiries) {
            var enquiriesList = $('#enquiriesList');
            enquiriesList.empty();
            var serialNumber = 1; 
            // Append each enquiry as a table row
            enquiries.forEach(function(enquiry) {
                var row = '<tr>';
                row += '<td>' + serialNumber  + '</td>';
                row += '<td>' + enquiry.name + '</td>';
                row += '<td>' + enquiry.email + '</td>';
                row += '<td>' + enquiry.mobilenumber + '</td>';
                // Add additional table columns for other enquiry details
                row += '</tr>';
                enquiriesList.append(row);
                serialNumber++;
            });
        });
    });
});

</script>

@endsection