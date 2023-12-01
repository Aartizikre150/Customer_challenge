(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.generateform = {
    attach: function (context, settings) {
      // Custom event for handling PDF download.
      $(document).on('generateformDownloadPdf', function (event, data) {
        // Create a Blob from the base64 PDF content.
        var byteCharacters = atob(data.pdfContent);
        var byteNumbers = new Array(byteCharacters.length);
        for (var i = 0; i < byteCharacters.length; i++) {
          byteNumbers[i] = byteCharacters.charCodeAt(i);
        }
        var byteArray = new Uint8Array(byteNumbers);
        var blob = new Blob([byteArray], { type: 'application/pdf' });

        // Create a temporary link and trigger a download.
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = 'example.pdf';
        link.click();

        // Remove the temporary link.
        document.body.removeChild(link);
      });

      // Trigger PDF download after form submission.
      $(document).trigger('generateformDownloadPdf', { pdfContent: drupalSettings.pdfContent });
    },
  };
})(jQuery, Drupal, drupalSettings);
