
function getGradient(ctx, chartArea, minY, maxY) {
    // Create the gradient because this is either the first render
    // or the size of the chart has changed
    gradient = ctx.createLinearGradient(0, chartArea.bottom, 1, chartArea.top);

    let pointUpperColor  = '#3b82ec';
    let pointHalfUpperColor = 'rgba(59,130,236,0.8)';
    let zeroPointColor = 'rgba(59,130,236,0.5)';
    let pointHalfLowerColor = '#3e4555';
    let pointLowerColor = '#3e4555';

    if (minY >= -5) {
        gradient.addColorStop(1, pointUpperColor);
        gradient.addColorStop(0.5, pointHalfUpperColor);
        gradient.addColorStop(0.0, pointLowerColor);
    }  else if (maxY <= 5) {
        gradient.addColorStop(1, zeroPointColor);
        gradient.addColorStop(0.5, pointHalfLowerColor);
        gradient.addColorStop(0, pointLowerColor);
    } else {
        // gradient.addColorStop(1, '#3B82EC');
        // gradient.addColorStop(0.6, '#3B82EC90');
        // gradient.addColorStop(0.25, 'rgba(59,130,236,0.28)');
        // gradient.addColorStop(0.07, '#3e4555');
        // gradient.addColorStop(0, '#3e4555')

        let fullDistance = parseFloat(maxY - minY);
        if(fullDistance == 0 || isNaN(maxY) || isNaN(minY)){
            gradient.addColorStop(1, pointUpperColor);
            return gradient;
        }

        let upperDelta = parseFloat(maxY / fullDistance);
        let lowerDelta = parseFloat(Math.abs(minY / fullDistance));

        let zeroPoint = parseFloat(lowerDelta);
        let lowerHalfPoint = parseFloat(zeroPoint / 2)
        let higherHalfPoint = parseFloat(zeroPoint + upperDelta / 2);
        gradient.addColorStop(1, pointUpperColor);
        gradient.addColorStop(higherHalfPoint, pointHalfUpperColor);
        gradient.addColorStop(zeroPoint, zeroPointColor);
        gradient.addColorStop(lowerHalfPoint, pointHalfLowerColor);
        gradient.addColorStop(0, pointLowerColor)
    }

    return gradient;
}

function getGradientGreen(ctx, chartArea, minY, maxY) {
    // Create the gradient because this is either the first render
    // or the size of the chart has changed
    gradient = ctx.createLinearGradient(0, chartArea.bottom, 1, chartArea.top);

    let pointUpperColor  = 'rgba(75,191,115,1)';
    let pointHalfUpperColor = 'rgba(75,191,115,0.8)';
    let zeroPointColor = 'rgba(75,191,115,0.5)';
    let pointHalfLowerColor = 'rgba(75,191,115,0.2)';
    let pointLowerColor = 'rgba(75,191,115,0.1)';

    if (minY >= -5) {
        gradient.addColorStop(1, pointUpperColor);
        gradient.addColorStop(0.5, pointHalfUpperColor);
        gradient.addColorStop(0.0, pointLowerColor);
    }  else if (maxY <= 5) {
        gradient.addColorStop(1, zeroPointColor);
        gradient.addColorStop(0.5, pointHalfLowerColor);
        gradient.addColorStop(0, pointLowerColor);
    } else {
        // gradient.addColorStop(1, '#3B82EC');
        // gradient.addColorStop(0.6, '#3B82EC90');
        // gradient.addColorStop(0.25, 'rgba(59,130,236,0.28)');
        // gradient.addColorStop(0.07, '#3e4555');
        // gradient.addColorStop(0, '#3e4555')

        let fullDistance = parseFloat(maxY - minY);
        if(fullDistance == 0 || isNaN(maxY) || isNaN(minY)){
            gradient.addColorStop(1, pointUpperColor);
            return gradient;
        }

        let upperDelta = parseFloat(maxY / fullDistance);
        let lowerDelta = parseFloat(Math.abs(minY / fullDistance));

        let zeroPoint = parseFloat(lowerDelta);
        let lowerHalfPoint = parseFloat(zeroPoint / 2)
        let higherHalfPoint = parseFloat(zeroPoint + upperDelta / 2);
        gradient.addColorStop(1, pointUpperColor);
        gradient.addColorStop(higherHalfPoint, pointHalfUpperColor);
        gradient.addColorStop(zeroPoint, zeroPointColor);
        gradient.addColorStop(lowerHalfPoint, pointHalfLowerColor);
        gradient.addColorStop(0, pointLowerColor)
    }

    return gradient;
}

function getBackgroundGradient(ctx, chartArea, minY, maxY) {

    let backgroundGradient = ctx.createLinearGradient(0, chartArea.bottom, 1, chartArea.top);

    let pointUpperColor  = 'rgba(59,130,236,0.5)'
    let pointHalfUpperColor = 'rgba(59,130,236,0.4)'
    let zeroPointColor = 'rgba(59,130,236,0.1)'
    let pointHalfLowerColor = 'rgba(62,69,85,0.05)'
    let pointLowerColor = 'rgba(62,69,85,0)'

    if (minY >= -5) {
        backgroundGradient.addColorStop(1, pointUpperColor);
        backgroundGradient.addColorStop(0.5, pointHalfUpperColor);
        backgroundGradient.addColorStop(0.0, pointLowerColor);
    } else if (maxY <= 5) {
        backgroundGradient.addColorStop(1, zeroPointColor);
        backgroundGradient.addColorStop(0.5, pointHalfLowerColor);
        backgroundGradient.addColorStop(0, pointLowerColor);
    } else  {
        let fullDistance = parseFloat(maxY - minY);
        if(fullDistance == 0 || isNaN(maxY) || isNaN(minY)){
            backgroundGradient.addColorStop(1, pointUpperColor);
            return backgroundGradient;
        }

        let upperDelta = parseFloat(maxY / fullDistance);
        let lowerDelta = parseFloat(Math.abs(minY / fullDistance));

        let zeroPoint = parseFloat(lowerDelta);
        let lowerHalfPoint = parseFloat(zeroPoint / 2)
        let higherHalfPoint = parseFloat(zeroPoint + upperDelta / 2);
        backgroundGradient.addColorStop(1, pointUpperColor);
        backgroundGradient.addColorStop(higherHalfPoint, pointHalfUpperColor);
        backgroundGradient.addColorStop(zeroPoint, zeroPointColor);
        backgroundGradient.addColorStop(lowerHalfPoint, pointHalfLowerColor);
        backgroundGradient.addColorStop(0, pointLowerColor)
    }

    // backgroundGradient.addColorStop(0, '#3e455533');
    // backgroundGradient.addColorStop(0.070, '#3e455533');
    // backgroundGradient.addColorStop(0.25, '#3B82EC20');
    // backgroundGradient.addColorStop(0.6, '#3B82EC30');
    // backgroundGradient.addColorStop(1, '#3B82EC40');

    return backgroundGradient;
}

function getBackgroundGradientGreen(ctx, chartArea, minY, maxY) {

    let backgroundGradient = ctx.createLinearGradient(0, chartArea.bottom, 1, chartArea.top);

    let pointUpperColor  = 'rgba(75,191,115,0.5)'
    let pointHalfUpperColor = 'rgba(75,191,115,0.4)'
    let zeroPointColor = 'rgba(75,191,115,0.1)'
    let pointHalfLowerColor = 'rgba(75,191,115,0.05)'
    let pointLowerColor = 'rgba(75,191,115,0.0)'

    if (minY >= -5) {
        backgroundGradient.addColorStop(1, pointUpperColor);
        backgroundGradient.addColorStop(0.5, pointHalfUpperColor);
        backgroundGradient.addColorStop(0.0, pointLowerColor);
    } else if (maxY <= 5) {
        backgroundGradient.addColorStop(1, zeroPointColor);
        backgroundGradient.addColorStop(0.5, pointHalfLowerColor);
        backgroundGradient.addColorStop(0, pointLowerColor);
    } else  {
        let fullDistance = parseFloat(maxY - minY);
        if(fullDistance == 0 || isNaN(maxY) || isNaN(minY)){
            backgroundGradient.addColorStop(1, pointUpperColor);
            return backgroundGradient;
        }

        let upperDelta = parseFloat(maxY / fullDistance);
        let lowerDelta = parseFloat(Math.abs(minY / fullDistance));

        let zeroPoint = parseFloat(lowerDelta);
        let lowerHalfPoint = parseFloat(zeroPoint / 2)
        let higherHalfPoint = parseFloat(zeroPoint + upperDelta / 2);
        backgroundGradient.addColorStop(1, pointUpperColor);
        backgroundGradient.addColorStop(higherHalfPoint, pointHalfUpperColor);
        backgroundGradient.addColorStop(zeroPoint, zeroPointColor);
        backgroundGradient.addColorStop(lowerHalfPoint, pointHalfLowerColor);
        backgroundGradient.addColorStop(0, pointLowerColor)
    }

    // backgroundGradient.addColorStop(0, '#3e455533');
    // backgroundGradient.addColorStop(0.070, '#3e455533');
    // backgroundGradient.addColorStop(0.25, '#3B82EC20');
    // backgroundGradient.addColorStop(0.6, '#3B82EC30');
    // backgroundGradient.addColorStop(1, '#3B82EC40');

    return backgroundGradient;
}

function getGradient_BTC(ctx, chartArea, minY, maxY) {
    // Create the gradient because this is either the first render
    // or the size of the chart has changed
    gradient = ctx.createLinearGradient(0, chartArea.bottom, 1, chartArea.top);

    let pointUpperColor  = '#f0ad4e';
    let pointHalfUpperColor = 'rgba(240,173,78,0.8)';
    let zeroPointColor = 'rgba(240,173,78,0.5)';
    let pointHalfLowerColor = 'rgba(240,173,78,0.2)';
    let pointLowerColor = 'rgba(240,173,78,0.1)';

    if (minY >= -5) {
        gradient.addColorStop(1, pointUpperColor);
        gradient.addColorStop(0.5, pointHalfUpperColor);
        gradient.addColorStop(0.0, pointLowerColor);
    }  else if (maxY <= 5) {
        gradient.addColorStop(1, zeroPointColor);
        gradient.addColorStop(0.5, pointHalfLowerColor);
        gradient.addColorStop(0, pointLowerColor);
    } else {
        // gradient.addColorStop(1, '#3B82EC');
        // gradient.addColorStop(0.6, '#3B82EC90');
        // gradient.addColorStop(0.25, 'rgba(59,130,236,0.28)');
        // gradient.addColorStop(0.07, '#3e4555');
        // gradient.addColorStop(0, '#3e4555')

        let fullDistance = parseFloat(maxY - minY);
        if(fullDistance == 0 || isNaN(maxY) || isNaN(minY)){
            gradient.addColorStop(1, pointUpperColor);
            return gradient;
        }

        let upperDelta = parseFloat(maxY / fullDistance);
        let lowerDelta = parseFloat(Math.abs(minY / fullDistance));

        let zeroPoint = parseFloat(lowerDelta);
        let lowerHalfPoint = parseFloat(zeroPoint / 2)
        let higherHalfPoint = parseFloat(zeroPoint + upperDelta / 2);
        gradient.addColorStop(1, pointUpperColor);
        gradient.addColorStop(higherHalfPoint, pointHalfUpperColor);
        gradient.addColorStop(zeroPoint, zeroPointColor);
        gradient.addColorStop(lowerHalfPoint, pointHalfLowerColor);
        gradient.addColorStop(0, pointLowerColor)
    }

    return gradient;
}

function getBackgroundGradient_BTC(ctx, chartArea, minY, maxY) {

    let backgroundGradient = ctx.createLinearGradient(0, chartArea.bottom, 1, chartArea.top);

    let pointUpperColor  = 'rgba(240,173,78,0.5)'
    let pointHalfUpperColor = 'rgba(240,173,78,0.4)'
    let zeroPointColor = 'rgba(240,173,78,0.1)'
    let pointHalfLowerColor = 'rgba(240,173,78,0.05)'
    let pointLowerColor = 'rgba(240,173,78,0)'

    if (minY >= -5) {
        backgroundGradient.addColorStop(1, pointUpperColor);
        backgroundGradient.addColorStop(0.5, pointHalfUpperColor);
        backgroundGradient.addColorStop(0.0, pointLowerColor);
    } else if (maxY <= 5) {
        backgroundGradient.addColorStop(1, zeroPointColor);
        backgroundGradient.addColorStop(0.5, pointHalfLowerColor);
        backgroundGradient.addColorStop(0, pointLowerColor);
    } else  {
        let fullDistance = parseFloat(maxY - minY);
        if(fullDistance == 0 || isNaN(maxY) || isNaN(minY)){
            backgroundGradient.addColorStop(1, pointUpperColor);
            return backgroundGradient;
        }

        let upperDelta = parseFloat(maxY / fullDistance);
        let lowerDelta = parseFloat(Math.abs(minY / fullDistance));

        let zeroPoint = parseFloat(lowerDelta);
        let lowerHalfPoint = parseFloat(zeroPoint / 2)
        let higherHalfPoint = parseFloat(zeroPoint + upperDelta / 2);
        backgroundGradient.addColorStop(1, pointUpperColor);
        backgroundGradient.addColorStop(higherHalfPoint, pointHalfUpperColor);
        backgroundGradient.addColorStop(zeroPoint, zeroPointColor);
        backgroundGradient.addColorStop(lowerHalfPoint, pointHalfLowerColor);
        backgroundGradient.addColorStop(0, pointLowerColor)
    }

    // backgroundGradient.addColorStop(0, '#3e455533');
    // backgroundGradient.addColorStop(0.070, '#3e455533');
    // backgroundGradient.addColorStop(0.25, '#3B82EC20');
    // backgroundGradient.addColorStop(0.6, '#3B82EC30');
    // backgroundGradient.addColorStop(1, '#3B82EC40');

    return backgroundGradient;
}

function getBackgroundGradient_Profit(ctx, chartArea) {

    let backgroundGradient = ctx.createLinearGradient(0, chartArea.bottom, 1, chartArea.top);

    let pointUpperColor  = 'rgba(75,191,115,1)'
    let pointHalfUpperColor = 'rgba(75,191,115,0.70)'
    let zeroPointColor = 'rgba(75,191,115,0.3)'


    backgroundGradient.addColorStop(1, pointUpperColor);
    backgroundGradient.addColorStop(0.7, pointHalfUpperColor);
    backgroundGradient.addColorStop(0.5, zeroPointColor);


    return backgroundGradient;
}

function getBackgroundGradient_ProfitHover(ctx, chartArea) {

    let backgroundGradient = ctx.createLinearGradient(0, chartArea.bottom, 1, chartArea.top);

    let pointUpperColor  = 'rgba(75,191,115,0.5)'
    let pointHalfUpperColor = 'rgba(75,191,115,0.3)'
    let zeroPointColor = 'rgba(75,191,115,0.1)'


    backgroundGradient.addColorStop(1, pointUpperColor);
    backgroundGradient.addColorStop(0.7, pointHalfUpperColor);
    backgroundGradient.addColorStop(0.5, zeroPointColor);


    return backgroundGradient;
}

function getBackgroundGradient_Loss(ctx, chartArea) {

    let backgroundGradient = ctx.createLinearGradient(0, chartArea.bottom, 1, chartArea.top);


    let zeroPointColor = 'rgba(217,83,79,0.3)'
    let pointHalfLowerColor = 'rgba(217,83,79,0.70)'
    let pointLowerColor = 'rgba(217,83,79,1)'

    backgroundGradient.addColorStop(0.5, zeroPointColor);
    backgroundGradient.addColorStop(0.3, pointHalfLowerColor);
    backgroundGradient.addColorStop(0, pointLowerColor)

    return backgroundGradient;
}

function getBackgroundGradient_LossHover(ctx, chartArea) {

    let backgroundGradient = ctx.createLinearGradient(0, chartArea.bottom, 1, chartArea.top);


    let zeroPointColor = 'rgba(217,83,79,0.1)'
    let pointHalfLowerColor = 'rgba(217,83,79,0.3)'
    let pointLowerColor = 'rgba(217,83,79,0.5)'


    backgroundGradient.addColorStop(0.5, zeroPointColor);
    backgroundGradient.addColorStop(0.3, pointHalfLowerColor);
    backgroundGradient.addColorStop(0, pointLowerColor)

    return backgroundGradient;
}