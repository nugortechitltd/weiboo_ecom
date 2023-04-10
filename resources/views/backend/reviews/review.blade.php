@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div
						class="breadcrumb-wrapper">
						<div>
							<h1>Review</h1>
						<p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
							<span><i class="mdi mdi-chevron-right"></i></span>Review
						</p>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table" style="width:100%">
											<thead>
												<tr>
									                                                                   
													<th>ID</th>
													<th>Photo</th>
													<th>Product name</th>
													<th>Customer name</th>
													<th>Date</th>
													<th>Rating</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach ($reviews as $sl => $product)
												<tr>
													<td>{{$sl+1}}</td>
													<td><img class="tbl-thumb" src="{{asset('uploads/products/preview')}}/{{$product->rel_to_product->preview_one}}" alt="product image"/></td>
													<td>{{$product->rel_to_product->product_name}}</td>
													<td>{{$product->rel_to_customer->name}}</td>
													<td>{{$product->created_at->format('d M Y')}}</td>
													<td>
														<div class="ec-t-rate">
                                                            @php
                                                                for ($i = 1; $i <= $product->star; $i++) {
                                                                    echo '<i class="mdi mdi-star is-rated"></i>';
                                                                }
                                                                for ($j = $product->star + 1; $j <= 5; $j++) {
                                                                    echo '<i class="mdi mdi-star"></i>';
                                                                }
                                                            @endphp
															{{-- <i class="mdi mdi-star is-rated"></i>
															<i class="mdi mdi-star is-rated"></i>
															<i class="mdi mdi-star is-rated"></i>
															<i class="mdi mdi-star is-rated"></i>
															<i class="mdi mdi-star"></i> --}}
														</div>
													</td>
													<td>
														<div class="btn-group mb-1">
															<button type="button"
																class="btn btn-outline-success">Info</button>
															<button type="button"
																class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																data-bs-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false" data-display="static">
																<span class="sr-only">Info</span>
															</button>

															<div class="dropdown-menu">
																<a class="dropdown-item" href="{{route('review.edit', $product->id)}}">Edit</a>
																{{-- <a class="dropdown-item" href="{{route('review.delete', $product->id)}}">Delete</a> --}}
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
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->
        </div>
    </div>
@endsection