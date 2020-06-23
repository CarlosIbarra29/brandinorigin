/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 function updateCartItem(obj, id) {
                $.get("cartAction.php", {action: "updateCartItem", id: id, qty: obj.value}, function (data) {
                    if (data == 'ok') {
                        location.reload();
                    } else {
                        alert('Cart update failed, please try again.');
                    }
                });
            }

