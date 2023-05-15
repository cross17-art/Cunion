


var instructionBlockApi =  document.querySelector('[instruction-image-block=api_key]');
var instructionBlockSecret =  document.querySelector('[[instruction-image-block=secret_key]');
var instructionBlockPassphrase =  document.querySelector('[[instruction-image-block=passphrase]');

class InstructionHighlighter{

    HideAll = () => {
        instructionBlockApi.style.display = "none";
        instructionBlockSecret.style.display = "none";
        instructionBlockPassphrase.style.display = "none";
    }

    ShowApiKeyInstruction = () => {
        this.HideAll();
        instructionBlockApi.style.display = "block";
    }

    ShowSecretKeyInstruction = () => {
        this.HideAll();
        instructionBlockSecret.style.display = "block";
    }

    ShowPassphraseInstruction = () => {
        this.HideAll();
        instructionBlockPassphrase.style.display = "block";
    }

}


instructoin_highligter = new InstructionHighlighter();



// instructionHighlighter.HighLight = (topPercent) => {
//     instructionHighlighter.style.display = "block";
//     apiInstructionBlock.style.display = "block";
//     passPhraseInstructionBlock.style.display = "none";
//
//     elem = document.querySelector('[api-instructoin-image]')
//     clientRect = elem.getBoundingClientRect()
//     instructionHighlighter.style.width = clientRect.width * 0.9 + "px";
//     instructionHighlighter.style.top = clientRect.top +  clientRect.height * (topPercent/100) + "px";
//     instructionHighlighter.style.left = clientRect.left +  clientRect.width/20;
// }



