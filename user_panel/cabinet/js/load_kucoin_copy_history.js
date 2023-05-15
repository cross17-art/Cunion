var iconUp = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trending-up align-middle me-2\"><polyline points=\"23 6 13.5 15.5 8.5 10.5 1 18\"></polyline><polyline points=\"17 6 23 6 23 12\"></polyline></svg>";
var iconDown = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trending-down align-middle me-2\"><polyline points=\"23 18 13.5 8.5 8.5 13.5 1 6\"></polyline><polyline points=\"17 18 23 18 23 12\"></polyline></svg>";
var coinIcon = "<i class=\"align-middle me-2 fas fa-fw fa-coins\"></i>";
var dollarCoin = "<i style=\" margin: 0 !important; padding: 0 !important; width: 10px\" class=\"align-middle me-2 fas fa-fw fa-dollar-sign\"></i>";
var clockIcon = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-clock align-middle me-2\"><circle cx=\"12\" cy=\"12\" r=\"10\"></circle><polyline points=\"12 6 12 12 16 14\"></polyline></svg>"

var link_icon= [
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34ba0db892b0006d7b0ec_USDT.png",
        "name": "USDT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8fc3db892b0006d73894_DOGE.png",
        "name": "DOGE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf86838afb0a00068efd1d_ADA.png",
        "name": "ADA3S"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74375db892b0006d819a9_KCS.png",
        "name": "KCS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf85728afb0a00068efcf6_1INCH.png",
        "name": "1INCH"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60e41b724916a50006c0aa92_2Crazy.png",
        "name": "2CRZ"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf858b8afb0a00068efcf9_AAVE.png",
        "name": "AAVE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60b88198db892b0006d63218_ABBC%20Logo.png",
        "name": "ABBC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf85bbdb892b0006d736ce_ACAT.png",
        "name": "ACAT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c0cbf9db892b0006d76192_KakaoTalk_20210425_131016497_03.png",
        "name": "ACE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf865edb892b0006d736f0_ACOIN.png",
        "name": "ACOIN"
    },
    {
        "currentSRC": "",
        "name": "ACT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8672db892b0006d736f1_ACT.png",
        "name": "ACT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf86ad8afb0a00068efd23_ADB.png",
        "name": "ADB"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf86e08afb0a00068efd2b_AERGO.png",
        "name": "AERGO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf87088afb0a00068efd36_AGI.png",
        "name": "AGIX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c037fedb892b0006d74cda_AI-mark-full-color-rgb-1000px%40300ppi.png",
        "name": "AI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf87298afb0a00068efd3c_AION.png",
        "name": "AION"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c81c5b8afb0a00068ffe84_AIOZ_logo.png",
        "name": "AIOZ"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf873edb892b0006d7370a_AKRO.png",
        "name": "AKRO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf874edb892b0006d7370b_ALBT.png",
        "name": "ALBT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf875f8afb0a00068efd42_ALEPH.png",
        "name": "ALEPH"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf877f8afb0a00068efd43_ALGO.png",
        "name": "ALGO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf87948afb0a00068efd48_ALPA.png",
        "name": "ALPA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c19353db892b0006d77acc_Alpaca.png",
        "name": "ALPACA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf87b3db892b0006d7371a_AMB.png",
        "name": "AMB"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5dbf91dc25325400087a6776_logo-A.png",
        "name": "AMPL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf88058afb0a00068efd57_ANC.png",
        "name": "ANC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf88188afb0a00068efd5c_ANKR.png",
        "name": "ANKR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf88298afb0a00068efd5d_AOA.png",
        "name": "AOA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf883b8afb0a00068efd5e_API3.png",
        "name": "API3"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf884fdb892b0006d7372a_APL.png",
        "name": "APL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf88638afb0a00068efd61_ARPA.png",
        "name": "ARPA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60cffd42db892b0006d92b47_Pirate_Logo_Coin_Gold.svg",
        "name": "ARRR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf88958afb0a00068efd73_ATOM.png",
        "name": "ATOM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8883db892b0006d73737_ARX.png",
        "name": "ARX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60d93794486fc5000611a67d_ASD%E9%BB%91%E8%89%B2.png",
        "name": "ASD"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf88c58afb0a00068efd78_AVAX.png",
        "name": "AVAX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60ee8c0f486fc50006a14942_AXIA_Coin_Decal_Blue-01.png",
        "name": "AXC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf88dddb892b0006d7374b_AXE.png",
        "name": "AXE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf88a9db892b0006d73744_AVA.png",
        "name": "AVA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf88ebdb892b0006d7374f_AXPR.png",
        "name": "AXPR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60f0f6ca486fc50006a1a84a_MicrosoftTeams-image.png",
        "name": "AXS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf88fadb892b0006d73750_BAT.png",
        "name": "BAT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf890e8afb0a00068efd7f_BAX.png",
        "name": "BAX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8929db892b0006d73753_BCD.png",
        "name": "BCD"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8948db892b0006d7375a_BCH.png",
        "name": "BCH"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/61308826f1150200068c805c_f179d0f6-9afa-4faf-b47a-9fd7c3ddaafb.jpg",
        "name": "BAL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf89b48afb0a00068efd96_BLOC.png",
        "name": "BLOC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf89798afb0a00068efd8f_BCHA.png",
        "name": "BCHA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8a7e8afb0a00068efdb9_BSV.png",
        "name": "BSV"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf899adb892b0006d73767_BEPRO.png",
        "name": "BEPRO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf89c28afb0a00068efd99_BNB.png",
        "name": "BNB"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf89dbdb892b0006d7376d_BNS.png",
        "name": "BNS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/612f4ddcf1150200068c2ff0_ca94e3bb-f955-49e8-9827-ff379e15933e.jpg",
        "name": "BNT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8a008afb0a00068efda7_BOA.png",
        "name": "BOA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8a118afb0a00068efdaa_BOLT.png",
        "name": "BOLT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60de7578486fc500061231df_MicrosoftTeams-image.png",
        "name": "BOND"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8a2fdb892b0006d7377c_BOSON.png",
        "name": "BOSON"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8a67db892b0006d73781_BRG.png",
        "name": "BRG"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8a90db892b0006d73786_BTC.png",
        "name": "BTC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8abedb892b0006d73790_BTCP.png",
        "name": "BTCP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8adb8afb0a00068efdc1_BTM.png",
        "name": "BTM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8b018afb0a00068efdc5_BTT.png",
        "name": "BTT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8b128afb0a00068efdc6_BU.png",
        "name": "BU"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60fd7b76486fc5000615adc5_CoinBurp%20-%20Logo%20-%20Black%20-%20500x500.png",
        "name": "BURP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8b1edb892b0006d73799_BUX.png",
        "name": "BUX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8b2e8afb0a00068efdc9_BUY.png",
        "name": "BUY"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5ec2328cd83f760008758536_cadh-v-light.png",
        "name": "CADH"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8b6c8afb0a00068efdd1_CAKE.png",
        "name": "CAKE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8b868afb0a00068efdd6_CAPP.png",
        "name": "CAPP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8b9b8afb0a00068efdd7_CARD.png",
        "name": "CARD"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8baadb892b0006d737b8_CARR.png",
        "name": "CARR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8bc18afb0a00068efde0_CAS.png",
        "name": "CAS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8be0db892b0006d737bf_CBC.png",
        "name": "CBC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8bef8afb0a00068efde8_CELO.png",
        "name": "CELO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60d2d833db892b0006084bb3_cEUR.png",
        "name": "cEUR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60ee8874486fc50006a14873_CFG%201.jpg",
        "name": "CFG"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8bff8afb0a00068efde9_CGG.png",
        "name": "CGG"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8c368afb0a00068efdfa_CHR.png",
        "name": "CHR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8c488afb0a00068efdfe_CHSB.png",
        "name": "CHSB"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8c598afb0a00068efe03_CHZ.png",
        "name": "CHZ"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/6119c092f115020006056edb_cirus%20logo.png",
        "name": "CIRUS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8c668afb0a00068efe06_CIX100.png",
        "name": "CIX100"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8c73db892b0006d737e7_CKB.png",
        "name": "CKB"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60f1121c486fc50006a1ac53_photo_2021-07-16_12.58.25-removebg-preview.png",
        "name": "CLV"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8c8a8afb0a00068efe0c_COFI.png",
        "name": "COFI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8c9d8afb0a00068efe13_COMB.png",
        "name": "COMB"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8caedb892b0006d737f3_COMP.png",
        "name": "COMP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8cbedb892b0006d737f4_COS.png",
        "name": "COS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8ccddb892b0006d737f7_COTI.png",
        "name": "COTI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8cdcdb892b0006d737fc_COV.png",
        "name": "COV"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8cebdb892b0006d737ff_CPC.png",
        "name": "CPC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c89904db892b0006d84743_Covalent_Logomark_Three%20Color_Circle.png",
        "name": "CQT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8cfc8afb0a00068efe1a_CRO.png",
        "name": "CRO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8d0fdb892b0006d73803_CRPT.png",
        "name": "CRPT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8d1edb892b0006d73807_CRV.png",
        "name": "CRV"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8d2e8afb0a00068efe22_CS.png",
        "name": "CS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8d40db892b0006d7380d_CSP.png",
        "name": "CSP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8d4fdb892b0006d73810_CTI.png",
        "name": "CTI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8d608afb0a00068efe2d_CUDOS.png",
        "name": "CUDOS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8d6edb892b0006d73817_cUSD.png",
        "name": "cUSD"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8d84db892b0006d7381c_CV.png",
        "name": "CV"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8d94db892b0006d7381e_CVC.png",
        "name": "CVC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8da38afb0a00068efe37_CWS.png",
        "name": "CWS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8de08afb0a00068efe44_CXO.png",
        "name": "CXO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8df0db892b0006d73838_DACC.png",
        "name": "DACC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8e05db892b0006d7383d_DAG.png",
        "name": "DAG"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8e118afb0a00068efe49_DAI.png",
        "name": "DAI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8e218afb0a00068efe4b_DAO.png",
        "name": "DAO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8e348afb0a00068efe4e_DAPPT.png",
        "name": "DAPPT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c0cc7f8afb0a00068f280b_DAPPX.png",
        "name": "DAPPX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8e50db892b0006d73842_DASH.png",
        "name": "DASH"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8e66db892b0006d7384a_DATX.png",
        "name": "DATX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8e7ddb892b0006d73852_DBC.png",
        "name": "DBC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8ea9db892b0006d73860_DCR.png",
        "name": "DCR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8ec28afb0a00068efe6c_DEGO.png",
        "name": "DEGO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8ed5db892b0006d7386f_DENT.png",
        "name": "DENT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8f02db892b0006d73878_DERO.png",
        "name": "DERO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8f16db892b0006d7387b_DFI.png",
        "name": "DFI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60ebabe8486fc5000613ee01_DFYN%20logo%20final%20RGB-06.png",
        "name": "DFYN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8f258afb0a00068efe7d_DGB.png",
        "name": "DGB"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8f328afb0a00068efe82_DGTX.png",
        "name": "DGTX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8f538afb0a00068efe87_DIA.png",
        "name": "DIA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8f62db892b0006d7388a_DIVI.png",
        "name": "DIVI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c81c02db892b0006d8366b_logo-DT-square.png",
        "name": "DLTA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8f728afb0a00068efe88_DMG.png",
        "name": "DMG"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8f868afb0a00068efe89_DOCK.png",
        "name": "DOCK"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8fb3db892b0006d73891_DODO.png",
        "name": "DODO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8fd78afb0a00068efe95_DON.png",
        "name": "DON"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60b6fc91db892b0006d5e308_8800.png",
        "name": "DORA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8fe5db892b0006d73896_DOT.png",
        "name": "DOT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/61010288cdb62c0006b9317e_Logo%20Game.png",
        "name": "DPET"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf8ff3db892b0006d73897_DPI.png",
        "name": "DPI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf90038afb0a00068efe9a_DRGN.png",
        "name": "DRGN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf90118afb0a00068efe9d_DSLA.png",
        "name": "DSLA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf902b8afb0a00068efeaa_DX.png",
        "name": "DX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf903a8afb0a00068efeaf_DYP.png",
        "name": "DYP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf90568afb0a00068efeb6_EDN.png",
        "name": "EDN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf9074db892b0006d738a5_EFX.png",
        "name": "EFX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf9095db892b0006d738a7_ELA.png",
        "name": "ELA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf90badb892b0006d738ad_ELF.png",
        "name": "ELF"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf90cadb892b0006d738ae_ELON.png",
        "name": "ELON"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf90d8db892b0006d738b4_ENJ.png",
        "name": "ENJ"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf90e68afb0a00068efec9_ENQ.png",
        "name": "ENQ"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf90f98afb0a00068efecb_EOS.png",
        "name": "EOS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf917bdb892b0006d738d6_EOSC.png",
        "name": "EOSC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/www/coin/pc/EPRX.png",
        "name": "EPRX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf91908afb0a00068efee4_EQZ.png",
        "name": "EQZ"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/6109fcc6cdb62c0006bed7d1_ERG.png",
        "name": "ERG"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf91a78afb0a00068efeea_ERSDL.png",
        "name": "ERSDL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf91c68afb0a00068efeef_ETC.png",
        "name": "ETC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf91d7db892b0006d738df_ETF.png",
        "name": "ETF"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf91f78afb0a00068efef7_ETH.png",
        "name": "ETH"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf920bdb892b0006d738e5_ETH2.png",
        "name": "ETH2"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60b77e44db892b0006d5f62e_ETHOlogo.png",
        "name": "ETHO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf923adb892b0006d738f2_ETN.png",
        "name": "ETN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf9250db892b0006d738f7_EWT.png",
        "name": "EWT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60d42ddf486fc5000611330a_EXRD.png",
        "name": "EXRD"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf9267db892b0006d738fc_FCL.png",
        "name": "FCL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf9275db892b0006d73900_FEAR.png",
        "name": "FEAR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf928f8afb0a00068eff0f_FET.png",
        "name": "FET"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf929ddb892b0006d73906_FIL.png",
        "name": "FIL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf92a8db892b0006d73907_FKX.png",
        "name": "FKX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf92c88afb0a00068eff1f_FLUX.png",
        "name": "FLUX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf92d38afb0a00068eff21_FLY.png",
        "name": "FLy"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf92e38afb0a00068eff26_FORESTPLUS.png",
        "name": "FORESTPLUS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60cadf46db892b0006d89e9c_FORM.png",
        "name": "FORM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf92ee8afb0a00068eff29_FORTH.png",
        "name": "FORTH"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf930adb892b0006d73916_FRM.png",
        "name": "FRM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf93178afb0a00068eff2f_FRONT.png",
        "name": "FRONT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf93248afb0a00068eff33_FTM.png",
        "name": "FTM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf9333db892b0006d7391d_FX.png",
        "name": "FX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/61163335ddf8990007f0276d_logo",
        "name": "GALAX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf93478afb0a00068eff34_GAS.png",
        "name": "GAS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60cac6ed8afb0a00069063ea_GENS_logo.png",
        "name": "GENS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf935b8afb0a00068eff39_GGC.png",
        "name": "GGC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf9366db892b0006d73924_GHX.png",
        "name": "GHX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60adbad28afb0a00068c0026_Glitch-logo_blank%20background%20%20copy.png",
        "name": "GLCH"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf93728afb0a00068eff3c_GLQ.png",
        "name": "GLQ"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf937cdb892b0006d73926_GMB.png",
        "name": "GMB"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf2267db892b0006d72962_gmee-800x800.png",
        "name": "GMEE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf93908afb0a00068eff45_GO.png",
        "name": "GO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/www/coin/pc/GOD.png",
        "name": "GOD"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf93a1db892b0006d73930_GOM2.png",
        "name": "GOM2"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf93afdb892b0006d73931_GOVI.png",
        "name": "GOVI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34c6ddb892b0006d7b118_GRIN.png",
        "name": "GRIN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf93cadb892b0006d73936_GRT.png",
        "name": "GRT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60ec0383486fc5000613f970_GSPI_Token.webp",
        "name": "GSPI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/613856adddf8990006154244_gc-h-pos.svg",
        "name": "GTC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf93ebdb892b0006d7393b_GZIL.png",
        "name": "GZIL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/611283e4cdb62c0006c04019_MicrosoftTeams-image.png",
        "name": "HAKA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c03e36db892b0006d74d76_HAI.png",
        "name": "HAI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60cafe018afb0a00069069dc_Artboard%208-8.png",
        "name": "HAPI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c03e788afb0a00068f1365_HORD.png",
        "name": "HORD"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c03ed88afb0a00068f136d_HOTCROSS.png",
        "name": "HOTCROSS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c03f3bdb892b0006d74d8b_HPB.png",
        "name": "HPB"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c03f088afb0a00068f1374_HT.png",
        "name": "HT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c03f1ddb892b0006d74d86_HTR.png",
        "name": "HTR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c740c9db892b0006d81952_HYDRA.png",
        "name": "HYDRA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74108db892b0006d81956_HYVE.png",
        "name": "HYVE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74125db892b0006d81957_ICP.png",
        "name": "ICP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74140db892b0006d8195b_IDEA.png",
        "name": "IDEA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c0debbdb892b0006d76430_IOI%20logo.png",
        "name": "IOI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74269db892b0006d81979_IOST.png",
        "name": "IOST"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c742928afb0a00068fe18c_IOTX.png",
        "name": "IOTX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/61371eeaddf899000614eb81_IXS%20Helmet%20White.png",
        "name": "IXS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c742ee8afb0a00068fe194_J8T.png",
        "name": "J8T"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c7430cdb892b0006d81989_JAR.png",
        "name": "JAR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c743278afb0a00068fe1a3_JST.png",
        "name": "JST"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c7433adb892b0006d81993_JUP.png",
        "name": "JUP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c7434ddb892b0006d8199c_KAI.png",
        "name": "KAI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60f6aba7486fc50006a26794_KAR1.png",
        "name": "KAR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74360db892b0006d819a3_KAT.png",
        "name": "KAT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c7438b8afb0a00068fe1b6_KDA.png",
        "name": "KDA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c743a0db892b0006d819b0_KEY.png",
        "name": "KEY"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c743d38afb0a00068fe1c2_KLV.png",
        "name": "KLV"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60ee98564916a50006c22fb0_KMD.png",
        "name": "KMD"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c743eddb892b0006d819b7_KNC.png",
        "name": "KNC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60b881568afb0a00068dfaee_KOK%20logo.png",
        "name": "KOK"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74404db892b0006d819bf_KONO.png",
        "name": "KONO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c744188afb0a00068fe1c8_KRL.png",
        "name": "KRL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c7442a8afb0a00068fe1ca_KSM.png",
        "name": "KSM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5f6c835544c2e7000655f64f_126B5DFE-61BB-42EA-BF86-113748C55152.png",
        "name": "KTSt"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74467db892b0006d819d0_LABS.png",
        "name": "LABS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c744888afb0a00068fe1ce_LAYER.png",
        "name": "LAYER"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c744a2db892b0006d819d4_LINK.png",
        "name": "LINK"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/6108e459dcbfec0006859f22_thumbnail.png",
        "name": "LITH"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c744d1db892b0006d819d9_LNCHX.png",
        "name": "LNCHX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c7450adb892b0006d819e2_LOC.png",
        "name": "LOC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c7452bdb892b0006d819e6_LOCG.png",
        "name": "LOCG"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c75945db892b0006d81d0a_OXEN.png",
        "name": "OXEN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c745748afb0a00068fe1e4_LOL.png",
        "name": "LOL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74593db892b0006d819eb_LON.png",
        "name": "LON"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c745aedb892b0006d819f2_LOOM.png",
        "name": "LOOM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60b72cb6db892b0006d5e7fe_LPOOL%20icon.png",
        "name": "LPOOL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60da98694916a50006bfa065_3640.png",
        "name": "LPT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c745c3db892b0006d819f3_LRC.png",
        "name": "LRC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c745d98afb0a00068fe1eb_LSK.png",
        "name": "LSK"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60b47fabdb892b0006d57ba5_LSS.png",
        "name": "LSS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c745f2db892b0006d819f8_LTC.png",
        "name": "LTC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c746038afb0a00068fe1ec_LTX.png",
        "name": "LTX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c746168afb0a00068fe1ef_LUNA.png",
        "name": "LUNA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c7462bdb892b0006d819fd_LYM.png",
        "name": "LYM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c7463c8afb0a00068fe1fa_LYXe.png",
        "name": "LYXE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74650db892b0006d81a01_MAHA.png",
        "name": "MAHA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/612855d7f1150200068aa090_twitterlogo.jpeg",
        "name": "MAKI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74665db892b0006d81a03_MAN.png",
        "name": "MAN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74677db892b0006d81a0b_MANA.png",
        "name": "MANA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c7468d8afb0a00068fe20c_MAP.png",
        "name": "MAP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/602dc5c895d4bc000652b404_Lounge%20M%20Symbol.png",
        "name": "LZM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c822538afb0a00068fff1b_img_circle.png",
        "name": "MARSH"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c746a1db892b0006d81a14_MASK.png",
        "name": "MASK"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c746b38afb0a00068fe215_MATIC.png",
        "name": "MATIC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c746cddb892b0006d81a1e_MCT.png",
        "name": "MCT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c817fcdb892b0006d835cd_MEM.png",
        "name": "MEM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c746f9db892b0006d81a25_MHC.png",
        "name": "MHC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c747698afb0a00068fe22e_MIR.png",
        "name": "MIR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c749a5db892b0006d81a88_MITX.png",
        "name": "MITX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74a0c8afb0a00068fe279_MKR.png",
        "name": "MKR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74a388afb0a00068fe283_MLK.png",
        "name": "MLK"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2c6ce8afb0a00068f685f_9679.png",
        "name": "MNST"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60cb1f2bdb892b0006d8a7c0_modefi_icon_light_bg_250.png",
        "name": "MODEFI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/612e0547ddf8990007f5fe00_Moonriver_logo_200x200-removebg-preview.png",
        "name": "MOVR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74a5e8afb0a00068fe28e_MSWAP.png",
        "name": "MSWAP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74a71db892b0006d81aab_MTC.png",
        "name": "MTC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/6114ea68dcbfec000687ab38_Metal%20%28MTL%29logo%20.svg",
        "name": "MTL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74b48db892b0006d81ad0_MTV.png",
        "name": "MTV"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74be98afb0a00068fe2ea_MVP.png",
        "name": "MVP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74dfbdb892b0006d81b4b_MWAT.png",
        "name": "MWAT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74e168afb0a00068fe344_MXC.png",
        "name": "MXC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74e268afb0a00068fe34a_MXW.png",
        "name": "MXW"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74e3fdb892b0006d81b5b_NANO.png",
        "name": "NANO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/61358c52f1150200068e01c0_NDUA.png",
        "name": "NDAU"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60e6c45d4916a50006c11714_near_icon.png",
        "name": "NEAR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74e548afb0a00068fe350_NEBL.png",
        "name": "NEBL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74ed3db892b0006d81b66_NEO.png",
        "name": "NEO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c334c58afb0a00068f749b_NFT.png",
        "name": "NFT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60d9777c486fc5000611abe4_Logo_Blue.png",
        "name": "NGM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74ee4db892b0006d81b67_NIF.png",
        "name": "NIF"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74efe8afb0a00068fe35c_NIM.png",
        "name": "NIM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74f37db892b0006d81b75_NIX.png",
        "name": "NIX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/6135c545f1150200068e1243_Numeraire%20logo-01.svg",
        "name": "NMR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74f4b8afb0a00068fe367_NOIA.png",
        "name": "NOIA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bf0b608afb0a00068eebd0_NORD.png",
        "name": "NORD"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c74f7d8afb0a00068fe36d_NRG.png",
        "name": "NRG"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c75148db892b0006d81bc1_NULS.png",
        "name": "NULS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c7516ddb892b0006d81bc4_NVT.png",
        "name": "NVT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/603f3eb2d04a880006ea8638_Logo%20transp.png",
        "name": "NWC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c7519ddb892b0006d81bc6_OCEAN.png",
        "name": "OCEAN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/611c7710f115020006c7084b_img_circle.png",
        "name": "ODDZ"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c757ae8afb0a00068fe49d_OGN.png",
        "name": "OGN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c757c4db892b0006d81cc8_OLT.png",
        "name": "OLT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c757d88afb0a00068fe4a0_OMG.png",
        "name": "OMG"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c758348afb0a00068fe4aa_ONE.png",
        "name": "ONE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c75848db892b0006d81cda_ONG.png",
        "name": "ONG"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c7586adb892b0006d81ce6_ONION.png",
        "name": "ONION"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c75886db892b0006d81ced_ONT.png",
        "name": "ONT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60eaa166486fc5000613cad3_OOE%20Kucoin%E9%80%82%E9%85%8D%E7%89%88.png",
        "name": "OOE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c758998afb0a00068fe4be_OPCT.png",
        "name": "OPCT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c758acdb892b0006d81cf6_OPEN.png",
        "name": "OPEN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c896c48afb0a0006900f39_Blue_Icon.png",
        "name": "OPS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c758c2db892b0006d81cfb_OPT.png",
        "name": "OPT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c758ebdb892b0006d81cfe_ORAI.png",
        "name": "ORAI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60d2f0578afb0a000691440f_3835.png",
        "name": "ORBS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c75917db892b0006d81d06_ORN.png",
        "name": "ORN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c7592fdb892b0006d81d07_OUSD.png",
        "name": "OUSD"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/613087f0f1150200068c804b_c3312ff9-8dca-46bb-8af3-80fba14769a7.jpg",
        "name": "OXT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2ffda8afb0a00068f6dfe_PAL.png",
        "name": "PAL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2fff5db892b0006d7a6c7_PAX.png",
        "name": "PAX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/6138533dddf8990006154166_PBXLOGO.svg",
        "name": "PBX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2feb5db892b0006d7a69a_PCX.png",
        "name": "PCX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2fed78afb0a00068f6dd8_PDEX.png",
        "name": "PDEX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2fe8bdb892b0006d7a699_PHA.png",
        "name": "PHA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2feed8afb0a00068f6ddc_PHNX.png",
        "name": "PHNX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2fcf68afb0a00068f6db7_PIVX.png",
        "name": "PIVX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2fe5c8afb0a00068f6dca_PLU.png",
        "name": "PLU"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c300298afb0a00068f6e04_PLAY.png",
        "name": "PLAY"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/61010806dcbfec00068481fb_logo-pmon%402x.png",
        "name": "PMON"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2fd73db892b0006d7a685_PMGT.png",
        "name": "PMGT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2fdb98afb0a00068f6dbe_PNK.png",
        "name": "PNK"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/611dc966ddf8990007f20959_pTokens-icon-white-eye.png",
        "name": "PNT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2fd408afb0a00068f6db8_POL.png",
        "name": "POL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2fe9e8afb0a00068f6dd5_POLK.png",
        "name": "POLK"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60b77ea98afb0a00068dbefc_icon-circle.png",
        "name": "POLS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2ff098afb0a00068f6de7_POLX.png",
        "name": "POLX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c30066db892b0006d7a6d6_POWR.png",
        "name": "POWR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c3007fdb892b0006d7a6da_PPT.png",
        "name": "PPT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2fd8b8afb0a00068f6dbd_PRE.png",
        "name": "PRE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60ae07708afb0a00068c0f2f_4120.png",
        "name": "PROM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2fe73db892b0006d7a694_PROPS.png",
        "name": "PROPS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2ff1ddb892b0006d7a6ae_PRQ.png",
        "name": "PRQ"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2fec5db892b0006d7a69f_PUNDIX.png",
        "name": "PUNDIX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c2ff348afb0a00068f6de8_PYR.png",
        "name": "PYR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/6124665addf8990007f3ba63_qi_on_dark.png",
        "name": "QI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c344248afb0a00068f7717_QKC.png",
        "name": "QKC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c3440b8afb0a00068f7711_QNT.png",
        "name": "QNT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/612e18c6ddf8990007f603ce_IMAGE%202021-08-31%2019%3A45%3A31.jpg",
        "name": "QRDO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c344588afb0a00068f771e_QTUM.png",
        "name": "QTUM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c3486ddb892b0006d7b043_REV.png",
        "name": "REV"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c344788afb0a00068f7720_RBTC.png",
        "name": "RBTC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c344fadb892b0006d7afc2_REAP.png",
        "name": "REAP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c3453bdb892b0006d7afc4_REN.png",
        "name": "REN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/612f3ec5f1150200068c2b75_802627E9-2903-41DF-A78A-F28490D5EEB2.png",
        "name": "REP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34890db892b0006d7b04a_REQ.png",
        "name": "REQ"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34527db892b0006d7afc3_REVV.png",
        "name": "REVV"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c344968afb0a00068f7728_RFOX.png",
        "name": "RFOX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c344ea8afb0a00068f773a_RFUEL.png",
        "name": "RFUEL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c344878afb0a00068f7723_RIF.png",
        "name": "RIF"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c345b1db892b0006d7afd7_RLY.png",
        "name": "RLY"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34552db892b0006d7afcb_RNDR.png",
        "name": "RNDR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c4c9428afb0a00068fa337_5028.png",
        "name": "ROAD"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5da68ea238300c2b63f8bd2a_Skype_Picture_2019_10_16T03_23_56_133Z.jpeg",
        "name": "ROOBEE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c3537ddb892b0006d7b21d_ROSE.png",
        "name": "ROSE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bdd7df8afb0a00068ec307_9783.png",
        "name": "ROSN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60f52c9d4916a50006c317fb_Logo_icon.png",
        "name": "ROUTE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c356418afb0a00068f7a18_SAND.png",
        "name": "SAND"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c353508afb0a00068f799a_SATT.png",
        "name": "SATT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/61358e74f1150200068e024a_SDAO.jpg",
        "name": "SDAO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/612ca24eddf8990007f5aa3c_logo.jpg",
        "name": "SDN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35cdf8afb0a00068f7b32_SDT.png",
        "name": "SDT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34fd78afb0a00068f7904_SENSO.png",
        "name": "SENSO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/6062f63795d4bc000657e21f_sero.png",
        "name": "SERO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c072b9db892b0006d753da_Seedify.fund%20256x256%20round-05.png",
        "name": "SFUND"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c353098afb0a00068f798f_SHA.png",
        "name": "SHA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60e67659486fc50006133291_TOKEN-Gradient.png",
        "name": "SHFT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c356b18afb0a00068f7a2c_SHIB.png",
        "name": "SHIB"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c353668afb0a00068f799d_SHR.png",
        "name": "SHR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35627db892b0006d7b298_SKEY.png",
        "name": "SKEY"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/6135c525ddf8990006146e09_SKALE%20logo%20svg.svg",
        "name": "SKL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/610a6fb0dcbfec000685e76c_smooth-love-potion%20%281%29.svg",
        "name": "SLP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c3533bdb892b0006d7b215_SNTVT.png",
        "name": "SNTVT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34933db892b0006d7b083_SNX.png",
        "name": "SNX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/610924a5dcbfec000685ab54_exchange-white.png",
        "name": "SOL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35b89db892b0006d7b366_SOLVE.png",
        "name": "SOLVE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35aba8afb0a00068f7adb_SOUL.png",
        "name": "SOUL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60d196c7db892b0006d955b4_photo_2021-06-21%2018.52.23.jpeg",
        "name": "SPHRI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60ec04814916a50006c1d14a_SPI_Token.webp",
        "name": "SPI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34e928afb0a00068f78c6_SPRK.png",
        "name": "SPRK"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35605db892b0006d7b295_SRK.png",
        "name": "SRK"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c356bd8afb0a00068f7a2d_STC.png",
        "name": "STC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34fc78afb0a00068f7902_STEEM.png",
        "name": "STEEM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60dd1b26486fc50006120e7c_STMX.png",
        "name": "STMX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c349afdb892b0006d7b0a0_STQ.png",
        "name": "STQ"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c597d7db892b0006d7ec0d_1891623562013_.pic.jpg",
        "name": "STND"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/61309183ddf8990007f69ad3_d24c98f7-1682-417f-b7c9-a09174adcd5d.jpg",
        "name": "STORJ"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c353b4db892b0006d7b228_STRONG.png",
        "name": "STRONG"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c356768afb0a00068f7a20_STRK.png",
        "name": "STRK"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5fa3669ef7b4c20006fb26ef_Stacks%20Logo.png",
        "name": "STX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c352ff8afb0a00068f798e_SUKU.png",
        "name": "SUKU"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60e2a316486fc5000612a13b_MicrosoftTeams-image.png",
        "name": "SUN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/605dbfd895d4bc00065755f2_2927.png",
        "name": "SUSD"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c3539b8afb0a00068f79a4_SUSHI.png",
        "name": "SUSHI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34fa4db892b0006d7b18a_SUTER.png",
        "name": "SUTER"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c356168afb0a00068f7a0c_SWINGBY.png",
        "name": "SWINGBY"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5d8b06a6c29cc63d8433b32c_Swipe-logo-circle%20-%20Cha%20Whale.png",
        "name": "SXP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34ff1db892b0006d7b1a2_SYLO.png",
        "name": "SYLO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35dfb8afb0a00068f7b55_TARA.png",
        "name": "TARA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c356958afb0a00068f7a25_TCP.png",
        "name": "TCP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c3611a8afb0a00068f7beb_TEL.png",
        "name": "TEL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35cd08afb0a00068f7b31_TFUEL.png",
        "name": "TFUEL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35cb28afb0a00068f7b28_THETA.png",
        "name": "THETA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34a408afb0a00068f780c_TIME.png",
        "name": "TIME"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c361828afb0a00068f7c05_TKY.png",
        "name": "TKY"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/611df3a9f115020006c75194_TLOS%20200.png",
        "name": "TLOS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35d0adb892b0006d7b3a5_TNC.png",
        "name": "TNC2"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60cac5478afb0a00069063b7_TOKO%20logo1%20%281%29.png",
        "name": "TOKO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5e5c854bf816040008d35f59_Asset_token.png",
        "name": "TOMO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5f9696b48972bb00065dae44_TONE%20%281%29.jpg",
        "name": "TONE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35e2bdb892b0006d7b3c8_TOWER.png",
        "name": "TOWER"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34a88db892b0006d7b0c7_TRAC.png",
        "name": "TRAC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/61370651ddf899000614e304_spaces_-MDuZIVVaKM65WSDT94C_avatar-1596565095853.png",
        "name": "TRB"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c355e6db892b0006d7b28f_TRIAS.png",
        "name": "TRIAS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/6125ad65ddf8990007f41964_TRIBE.png",
        "name": "TRIBE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35bc6db892b0006d7b372_TRTL.png",
        "name": "TRTL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34b5fdb892b0006d7b0dd_TRX.png",
        "name": "TRX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35beddb892b0006d7b374_TT.png",
        "name": "TT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34b6c8afb0a00068f7839_TUSD.png",
        "name": "TUSD"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/611a25a9ddf8990007f13ced_TXA_black_sm.png",
        "name": "TXA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c362f2db892b0006d7b4ca_UBX.png",
        "name": "UBX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35372db892b0006d7b21a_UBXT.png",
        "name": "UBXT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5f86d52e25cce60006d9a645_Hyprr%20png.png",
        "name": "UDOO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c363048afb0a00068f7c57_UMA.png",
        "name": "UMA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35dce8afb0a00068f7b4f_UNFI.png",
        "name": "UNFI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c3532edb892b0006d7b210_UNI.png",
        "name": "UNI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c362bddb892b0006d7b4ba_UNO.png",
        "name": "UNO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35346db892b0006d7b217_UOS.png",
        "name": "UOS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c362e2db892b0006d7b4c8_UQC.png",
        "name": "UQC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5cfdbab438300c4320a531ec_usdc-icon.png",
        "name": "USDC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35316db892b0006d7b207_USDJ.png",
        "name": "USDJ"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c3538c8afb0a00068f79a3_UST.png",
        "name": "UST"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35004db892b0006d7b1a7_USDN.png",
        "name": "USDN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34bd8db892b0006d7b0f7_UTK.png",
        "name": "UTK"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/6116313bf115020006046ef6_111-removebg-preview.png",
        "name": "VAI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60b0b17fdb892b00064dd895_VEED-iconlogo.png",
        "name": "VEED"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c363348afb0a00068f7c59_VELO.png",
        "name": "VELO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/www/coin/pc/VET.png",
        "name": "VET"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5f59a22825cce60006d9359e_Group%20373%20%281%29.png",
        "name": "VI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5d638c3038300c2b63f7e8a2_VideoCoin_token.png",
        "name": "VID"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5d916f97134ab727b23a89d5__V-ID%28VIDT%29-token-logo-.png",
        "name": "VIDT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/www/coin/pc/VNX.png",
        "name": "VNX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35c0b8afb0a00068f7b0c_VOL.png",
        "name": "VOL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5dfca70e4a338000093e0d8f_Verasity%20Logo%2096%20x%2096.png",
        "name": "VRA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c359cc8afb0a00068f7ab3_VSYS.png",
        "name": "VSYS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34bf68afb0a00068f7859_VTHO.png",
        "name": "VTHO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c363778afb0a00068f7c60_WAN.png",
        "name": "WAN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c352d9db892b0006d7b203_WAVES.png",
        "name": "WAVES"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c3638bdb892b0006d7b4e2_WAXP.png",
        "name": "WAXP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5ff7ffd4860ac800068a0236_WBTC.png",
        "name": "WBTC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c352ce8afb0a00068f7989_WEST.png",
        "name": "WEST"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c363d28afb0a00068f7c6e_WGP.png",
        "name": "WGP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/612c7bafddf8990007f5a0f0_WWLogo_TransparentBG.png",
        "name": "WILD"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c363c58afb0a00068f7c6c_WIN.png",
        "name": "WIN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c3535ddb892b0006d7b218_WIS.png",
        "name": "WIS"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35d658afb0a00068f7b41_WOM.png",
        "name": "WOM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/612cecc4ddf8990007f5bfe3_61375ee3-369a-463a-ad03-f1d7c834fe8d.jpg",
        "name": "WOO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c36246db892b0006d7b4a2_WTC.png",
        "name": "WTC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35c1ddb892b0006d7b37c_WXT.png",
        "name": "WXT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c0316d8afb0a00068f11f7_Logo%20%282%29.png",
        "name": "XAVA"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c36064db892b0006d7b42b_XCAD.png",
        "name": "XCAD"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/610b5618dcbfec0006860cb0_chia_logo.svg",
        "name": "XCH"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35e0e8afb0a00068f7b5a_XCUR.png",
        "name": "XCUR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34fe5db892b0006d7b1a1_XDB.png",
        "name": "XDB"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c360038afb0a00068f7bb7_XDC.png",
        "name": "XDC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c363fb8afb0a00068f7c79_XEM.png",
        "name": "XEM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c35db58afb0a00068f7b4c_XHV.png",
        "name": "XHV"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34c268afb0a00068f7867_XLM.png",
        "name": "XLM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5c86109438300c31d25f7040_monero-token.png",
        "name": "XMR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/61223cbfddf8990007f31a5d_XPR-Icon-200x200.png",
        "name": "XPR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34c418afb0a00068f786d_XRP.png",
        "name": "XRP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c350118afb0a00068f790f_XSR.png",
        "name": "XSR"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34ea68afb0a00068f78c7_XTZ.png",
        "name": "XTZ"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c356328afb0a00068f7a11_XYM.png",
        "name": "XYM"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34c50db892b0006d7b111_XYO.png",
        "name": "XYO"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60cac746db892b0006d89c27_Logo-YFDAI-Icon-Blue%20%282%29.png",
        "name": "YFDAI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5f5b1b2525cce60006d93b74_yfi-192x192.png",
        "name": "YFI"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/6131c63ff1150200068cdb28_Ygg_Icon.png",
        "name": "YGG"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c36477db892b0006d7b4f6_YOP.png",
        "name": "YOP"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60bdd03f8afb0a00068ec241_0Aji5pVm.png",
        "name": "ZCX"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/5d1b330ac29cc606c485e20e_Zcash-%28ZEC%29-token-logo-.png",
        "name": "ZEC"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c355f5db892b0006d7b294_ZEE.png",
        "name": "ZEE"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c364aa8afb0a00068f7c9c_ZEN.png",
        "name": "ZEN"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c364c58afb0a00068f7ca1_ZIL.png",
        "name": "ZIL"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60e549f24916a50006c0d8b1_zortlogo.png",
        "name": "ZORT"
    },
    {
        "currentSRC": "https://assets-currency.kucoin.com/60c34c5edb892b0006d7b115_ZRX.png",
        "name": "ZRX"
    }
]

function search_image(ticker){
    var result=0;
    for(var i=0;i<link_icon.length;i++){
        result= link_icon[i].name.indexOf(ticker);
        if(result>=0){
            return i;
        }
    }
}

class KucoinCopyHistoryLoader {

    nicknamesArray;

    LoadHistory = async () => {
        console.log("collecting the history")
        let historyResult = await fetch('http://167.71.227.107:3000/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({history_request: {followerEmail: user.email}})
        }).then((rsp) => {
            return rsp.json();
        }).then((data) => {
            return data;
        })

        return await historyResult
    }

    LoadNicknames = async () => {
        let url = "https://cunion.io/client:/cabinet/php_scripts/get_user_nicks_pairs.php";
        this.nicknamesArray = await fetch(url).then((rsp) => {
            return rsp.json();
        }).then((data) =>{
            console.log('\x1b[36m', "nicknames:", data, '\x1b[0m');
            if(data.status === "success"){
                return data.nicknames;
            } else {
                return null
            }
        }).catch((err) => {
            console.log('x1b[31m', "Some error while getting the nicknames");
            throw err;
        })

        return this.nicknamesArray;
    }

    GetUser = (email) => {
        return this.nicknamesArray.find((userData)=>{
            if(userData.email === email){
                return userData;
            }
        })
    }

    appendTradeAttemptToTable = (table, trade_attempt) => {

        let date = trade_attempt.date;
        let from = trade_attempt.email_from;

        let masterId = -1;
        let masterNickname = "undefined";

        if(this.GetUser(from) !== undefined){
            masterNickname = this.GetUser(from).nickname;
            masterId = this.GetUser(from).id;
        }

        let status = trade_attempt.status;

        let symbol = JSON.parse(trade_attempt.master_order).symbol;
        let side = JSON.parse(trade_attempt.master_order).side;
        let qty = JSON.parse(trade_attempt.master_order).filledSize;

        let masterTime = JSON.parse(trade_attempt.master_order).ts / 1000000;
        let followerTime = 0;
        let resultEvent = JSON.parse(trade_attempt.result_event);

        let time = new Date(date);
        let hours = time.getUTCHours();
        let minutes = time.getUTCMinutes();
        let seconds = time.getUTCSeconds();
        let formatTime = time.getDate() + "/" + (time.getMonth() + 1) + "/" + time.getUTCFullYear() + " " +
            (hours < 10 ? "0" + hours : hours) + ":" +
            (minutes < 10 ? "0" + minutes : minutes) + ":" +
            (seconds < 10 ? "0" + seconds : seconds);

        let followerOrderId;
        let msg;
        let orderSize = "";
        let dealFunds = "";
        let fee = "";
        let delay = 0

        if ('followerOrderID' in resultEvent) {
            followerOrderId = JSON.parse(trade_attempt.result_event).followerOrderID
            // msg = "ID:" + followerOrderId;
            msg = "";
            let orderInfo = JSON.parse(trade_attempt.follower_order_statistics);
            orderSize = orderInfo.size;
            dealFunds = orderInfo.dealFunds;
            followerTime = orderInfo.createdAt;
            delay = parseInt(followerTime) - parseInt(masterTime);

        } else {
            msg = JSON.parse(trade_attempt.result_event).msg;
        }

        let trTemplate = table.querySelector("tbody > [kucoin-history-tr-template]");
        let newTr = trTemplate.cloneNode(true);
        newTr.style.display = "table-row";

        newTr.querySelector('[date]').innerHTML = formatTime;
        if(masterId !== -1){
            newTr.querySelector('[from]').innerHTML = '<a href="https://cunion.io/client/cabinet/cabinet_master_page.php?master-id=' + masterId + '">' + (masterNickname == null ? from : masterNickname) + '</a>';
        } else {
            newTr.querySelector('[from]').innerHTML = "undef";
        }
        newTr.querySelector('[symbol]').innerHTML = symbol;
        newTr.querySelector(".quote-asset").setAttribute('src', link_icon[search_image(symbol.split("-")[0])].currentSRC);
        newTr.querySelector(".base-asset").setAttribute('src', link_icon[search_image(symbol.split("-")[1])].currentSRC);

        // let quoteIcon = GetDupplIconBySymbol(symbol).quoteIcon;
        // let baseIcon = GetDupplIconBySymbol(symbol).baseIcon;
        // newTr.querySelector('[symbol]').appendChild(quoteIcon);
        // newTr.querySelector('[symbol]').appendChild(baseIcon);



        if (side === 'buy') {
            newTr.querySelector('[side]').style.color = '#4bbf73'
            newTr.querySelector('[side]').innerHTML = 'buy ' + iconUp;
        } else {
            newTr.querySelector('[side]').innerHTML = 'sell ' + iconDown;
            newTr.querySelector('[side]').style.color = '#d9534f '

        }
        newTr.querySelector('[qty]').innerHTML = qty;
        newTr.querySelector('[status]').innerHTML = '<span class="badge ' + (status === 'failed' ? 'bg-warning' : 'bg-success') + '">' + status + '</span>';
        // newTr.querySelector('[msg]').innerHTML = msg;

        newTr.querySelector('[follower_order_size]').innerHTML = orderSize === "" ? "" :  coinIcon + orderSize;

        if (symbol.includes("-USDT")) {
            newTr.querySelector('[deal-funds]').innerHTML = dealFunds !== "" ? dollarCoin + " " + parseInt(dealFunds * 100) / 100 : "";
        } else {
            newTr.querySelector('[deal-funds]').innerHTML = dealFunds !== "" ? parseInt(dealFunds * 100) / 100 : "";
        }

        if(delay === 0){
            newTr.querySelector('[delay]').innerHTML = msg;
        } else {
            newTr.querySelector('[delay]').innerHTML = delay === 0 ? " - " : clockIcon + delay + " ms";
        }


        table.querySelector("tbody").appendChild(newTr);
    }
}

//---------------------

var tradeHistory;
const kucoin_copy_history_loader = new KucoinCopyHistoryLoader();

LoadKucoinHistory = async () => {

    let nickNamesPromise = new Promise((resolve, reject) => {
        kucoin_copy_history_loader.LoadNicknames().then((data) => {
            resolve(data)
        }).catch((err)=>{
            reject(err);
        })
    })

    tradeHistory = await kucoin_copy_history_loader.LoadHistory().then((history) => {
        return history.history
    });

    console.log(tradeHistory);
    let nicknames = await nickNamesPromise;

    tradeHistory.forEach((trade_attempt) => {
        console.log(trade_attempt);
        let table = document.querySelector("#kucoin_copy_history_table");
        kucoin_copy_history_loader.appendTradeAttemptToTable(table, trade_attempt);
        //
        // $("#kucoin_copy_history_table").DataTable({
        //     pageLength: 6,
        //     lengthChange: false,
        //     bFilter: false,
        //     autoWidth: false
        // });
    })

}

GetDupplIconBySymbol = (symbol) => {

    let quoteAsset = symbol.split("-")[0];
    let baseAsset = symbol.split("-")[1]

    let quoteIcon = document.createElement("img");
    let baseIcon = document.createElement("img");

    quoteIcon.setAttribute('src', link_icon[search_image(quoteAsset)].currentSRC);
    baseIcon.setAttribute('src', link_icon[search_image(baseAsset)].currentSRC);

    quoteIcon.classList.add("quote-icon");
    baseIcon.classList.add("base-icon");

    return {
        quoteIcon: quoteIcon,
        baseIcon: baseIcon
    }
}
