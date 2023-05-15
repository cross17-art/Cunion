module.exports = {
    apps: [
        {
            name: "server_v1",
            script: "./test/server_v1.js",
            watch: false
        },
        {
            name: "spam_server",
            script: "./test/spam_server.js",
            watch: false
        },
        {
            name: "2af",
            script: "./test/2af/index.js",
            watch: false
        },
        {
            name: "ws2_proxy_server",
            script: "./test/ws2_proxy_server.js",
            watch: false
        },
        {
            name: "collect_kucoin_balances",
            script: "./test/collect_kucoin_balances.js",
            watch: false
        },
        {
            name: "collect_masters_portfolio",
            script: "./test/collect_masters_portfolio.js",
            watch: false
        },
        {
            name: "coinpayments",
            script: "./test/coinpayments_transaction.js",
            watch: false
        },
    ]
}
