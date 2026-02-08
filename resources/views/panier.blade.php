<h2>Mon Panier</h2>

@if (empty($cart))
<p>Votre panier est vide.</p>
@else
<table>
    
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix Unitaire</th>
            <th>Total</th>
        </tr>
        @php $total = 0; @endphp
        @foreach($cart as $id => $item)
            @php $total += $item['prix'] * $item['quantity']; @endphp
   
   
       
        <tr>
            <td>{{ $item['nom'] }}</td>
            <td>{{ $item['quantity'] }}</td>
            <td>{{ number_format($item['prix'], 2) }} €</td>
            <td>{{ number_format($item['prix'] * $item['quantity'], 2) }} €</td>
        </tr>
        @endforeach
   
        <tr>
            <td colspan="3"><strong>Total Général</strong></td>
            <td><strong>{{ number_format($total, 2) }} €</strong></td>
        </tr>
   
</table>
@endif