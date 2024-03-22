
@php
 $tp = old('delivery_fee') ? old('delivery_fee') : (isset($fee) ? $fee : 0);
@endphp
<tbody>
  <tr>
    <td>Cart Subtotal</td>
    <td>₦{{number_format(\Cart::session(auth()->id())->getTotal())}}</td>
  </tr>
  <tr class="shipping-fee">
    <td>Shipping</td>
    <td id="shipping-fee">{{ $tp == 0 ? '---' : '₦'.number_format($tp) }}</td>
  </tr>
  <tr>
    <td>Total</td>
    <td>₦{{number_format(\Cart::session(auth()->id())->getTotal() + $tp)}}</td>
  </tr>
  <input type="hidden" value="{{$tp}}" name="delivery_fee">
</tbody>
