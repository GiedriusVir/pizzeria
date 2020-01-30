




// $(document).ready(function(){
    
//     $(document).on("mouseenter", "#cart", function(){
//         // axios.post(getCartUrl, {})
//         //     .then(function (response) {
//         //         console.log(response);
//         //         $('#top-cart').empty().html(response.data.html);
//         //     })
//         //     .catch(function (error) {
//         //         console.log(error);
//         //     });
//         console.log('aa');
//     });

//     $(document).on("mouseleave", "#cart", function(){
//         // $('#top-cart').empty();
        
//         console.log('bbbb');
//     });
// }); 

document.querySelector("#cart").addEventListener("mouseenter", (e) => { 
    document.querySelector("#cart-hidden").classList.add('cart-open');
});

document.querySelector("#cart").addEventListener("mouseleave", (e) => { 
    setTimeout(function(){ 
        document.querySelector("#cart-hidden").classList.remove('cart-open'); 
    }, 1000);
});