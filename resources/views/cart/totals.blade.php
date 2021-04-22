<table class="table table-condensed table-bordered mt-2 mb-5">
    <tbody>
        <tr>
            <th>Subtotal</th><td>{{ 'Kes.'.$subTotal}}</td>
        </tr>
        <tr>
            <th>Tax (V.A.T)</th><td>{{ 'Kes.'.$tax }}</td>
        </tr>
        <tr>
            <th>Discount</th><td>Kes. {{number_format($discount)}}</td>
        </tr>
        <tr>
            <th>Total</th><td>Kes. {{number_format($total)}}</td>
        </tr>
    </tbody>
</table>