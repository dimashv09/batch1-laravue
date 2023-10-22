<div class="title" style="padding-bottom: 13px">
	<div style="text-align: center; text-transform: uppercase;font-size: 15px">
		SarawiStore.
	</div>
	<div style="text-align: center">
		Alamat: Dusun Bukulasa, Desa Bukit Durian, Kec. Oba Utara, Kab. Tidore Kepulauan
	</div>
	<div style="text-align: center">
		Telp: 0821-9008-2622
	</div>
</div>
<table style="width: 100%">
	<thead>
		<tr style="background-color: #e6e6e7">
			<th scope="col">Date</th>
			<th scope="col">Product</th>
			<th scope="col">Qty</th>
			<th scope="col">Invoice</th>
			<th scope="col">Total</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($profits as $profit)
		<tr style="text-align: center">
			<td class="text-center">{{ $profit->created_at }}</td>
			<td>{{ $profit->transaction->details[0]->product->title }}</td>
			<td>{{ $profit->transaction->details[0]->qty }}</td>
			<td>{{ $profit->transaction->invoice }}</td>
			<td class="text-end">{{ formatPrice($profit->total) }}</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="4" class="text-center fw-bold" style="background-color:#e6e6e7;text-align: center">TOTAL</td>
			<td class="fw-bold" style="background-color:#e6e6e7;text-align: center">{{ formatPrice($total) }}</td>
		</tr>
	</tbody>
</table>