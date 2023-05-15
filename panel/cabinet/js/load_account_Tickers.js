// var dust = [];
//
// function DisplayTickers() {
//     var index = dust.length;
//     dust.splice(0, index);
//
//     var eventPairElem_0 = document.getElementById("tr_tickers").cloneNode(true);
//     //document.getElementById("tbodytikers").remove();
//     let len = document.getElementById("tbodytikers").children.length
//     for (var i = 0; i < len; i++) {
//         document.getElementById("tbodytikers").children[0].remove();
//         // document.getElementById("tbodytikers").children[0].style.display='none';
//     }
//
//     for (var i = 0; i < user_account.balance.balance_USDT.msg.length; i++) {
//         if (user_account.balance.data[i].balance != 0) {
//             if (user_account.balance.data[i].type != 'main') {
//                 // document.querySelector("total>sub")
//                 let eventPairElem = eventPairElem_0.cloneNode(true);
//
//                 eventPairElem.querySelector("#td_id").innerHTML = i;
//
//                 var link_id = search_image(user_account.balance.balance_USDT.msg[i].ticker);
//
//                 let image = new Image()
//                 // console.log(link_id===undefined)
//                 if(link_id !== undefined) {
//                     let l = link_icon[link_id].currentSRC;
//                     // console.log(l === undefined)
//                     // console.log(l == undefined)
//                     // console.log(l === null)
//                     // console.log(l == null)
//                     // console.log(l === '')
//                     // console.log(l == '')
//                     // console.log(isNaN(l))
//                     // console.log(l)
//
//                         image.src = (l);
//                         image.width = 30;
//                         image.height = 30;
//
//                         eventPairElem.querySelector("#coin").innerHTML = '<img style="margin-left: 5px" class = "coin_icon" src="' + image.src + '">';
//                         eventPairElem.querySelector("#coin").innerHTML += user_account.balance.balance_USDT.msg[i].ticker;
//                         eventPairElem.querySelector("#total>sub").innerHTML = '&#x2248;' + Math.round(user_account.balance.balance_USDT.msg[i].total * 100) / 100 + ' USDT';
//                         eventPairElem.querySelector("#amount>sub").innerHTML = '&#x2248;' + Math.round(user_account.balance.balance_USDT.msg[i].available * 100) / 100 + ' USDT';
//                         eventPairElem.querySelector("#orders>sub").innerHTML = '&#x2248;' + Math.round(user_account.balance.balance_USDT.msg[i].orders * 100) / 100 + ' USDT';
//
//
//                         eventPairElem.querySelector("#total>div").innerHTML = user_account.balance.data[i].balance;
//                         eventPairElem.querySelector("#amount>div").innerHTML = user_account.balance.data[i].available;
//                         eventPairElem.querySelector("#orders>div").innerHTML = user_account.balance.data[i].holds;
//
//                         //Color dust
//
//
//                         let closeElement = eventPairElem.querySelector("#kucoin_close_action > div > [kucoin_close_button]");
//
//                         if (user_account.balance.balance_USDT.msg[i].total < 0.3) {
//
//
//                             eventPairElem.querySelector("#total").style.color = "#cc8b36";
//                             eventPairElem.querySelector("#amount").style.color = "#cc8b36";
//                             eventPairElem.querySelector("#orders").style.color = "#cc8b36";
//                             eventPairElem.querySelector("#coin").style.color = "#cc8b36";
//                             eventPairElem.querySelector("#td_id").style.color = "#cc8b36";
//                             closeElement.style.display = "none";
//                             eventPairElem.querySelector("#kucoin_close_action > div ").innerHTML = "DUST";
//                             let span = document.createElement('span')
//                             // <span style="font-size: 0.7em;">Rating</span>
//                             span.style.fontSize = '0.7em';
//                             span.innerText =
//                                 'Пылью можно назвать небольшое количество монет или токенов которые остались на торговом аккаунте после исполнение торговых ордеров.'
//                             span.classList.add('trd_tooltiptext')
//                             // span.style.fontSize='1em !important'
//                             span.style.setProperty('font-size', '1em', 'important');
//                             span.style.width = '200px'
//                             eventPairElem.querySelector("#kucoin_close_action > div ").appendChild(span)
//                             //  eventPairElem.querySelector("#kucoin_close_action > div span").classList.add('trd_tooltiptext');
//                             eventPairElem.querySelector("#kucoin_close_action > div").style.color = "#cc8b36";
//
//
//                             dust.push({
//                                 "ticker": user_account.balance.balance_USDT.msg[i].ticker,
//                                 "total": user_account.balance.balance_USDT.msg[i].total
//                             });
//                         } else {
//                             let assetName = user_account.balance.data[i].currency;
//                             let assetAmount = user_account.balance.data[i].available;
//                             closeElement.setAttribute("asset_name", assetName)
//                             closeElement.setAttribute("asset_amount", assetAmount);
//                             // closeElement.setAttribute("index", i);
//
//                         }
//
//                         if (user_account.balance.data[i].currency === 'USDT') {
//                             closeElement.style.display = 'none'
//                             //document.querySelector(".trd_tooltip span").remove()
//
//                         } else {
//                             closeElement.style.display = 'block'
//
//                         }
//
//                         //--- Close coin attributes ---
//
//
//                         // let eventPairElem = document.getElementById("tr_tickers").cloneNode(true);
//
//                         document.getElementById("tbodytikers").appendChild(eventPairElem);
//                         document.getElementById("tbodytikers").style.display = ''
//
//                 }
//             }
//         }
//     }
//     document.querySelector(".spinner-border.text-primary.me-2").style.display = 'none';
//
//
//     // let _dust
//     // for (var i = 0; i < dust.length; i++) {
//     //
//     //
//     // }
//
//     //  document.getElementById("tbodytikers").remove();
//     //document.querySelector('#tbodytikers').children[0].remove();
//
// }
//
// function search_image(ticker) {
//     var result = 0;
//     for (var i = 0; i < link_icon.length; i++) {
//         result = link_icon[i].name.indexOf(ticker);
//         if (result >= 0) {
//             return i;
//         }
//     }
// }