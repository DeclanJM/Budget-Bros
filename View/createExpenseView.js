$(document).ready(function () {
});
function createTables(url) {
  try {
    $.ajax({
      url: url,
      dataType: "text",
      success: function (data) {
        var transaction_data = data.split(/\r?\n|\r/);
        var page_data = `
      <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <title>Transaction Entries</title>
          <style>
              body { background-color: #fff; color: black; filter: grayscale(100%); }
              table { width: 80%; margin: auto; border-collapse: collapse; }
              td, th { border: 1px solid black; text-align: center; padding: 5px; }
              .header { text-align: center; margin-bottom: 20px; }
              @media print {
                  body { -webkit-print-color-adjust: exact; }
              }
          </style>
      </head>
      <body>
          <div class="header">
              <h1>Budget Bros</h1>
              <h2>Transaction Entries:</h2>
          </div>
      `;
        var table_data = '<table class="table table-bordered table-striped">';
        for (var i = 0; i < transaction_data.length - 1; i++) {
          var cell_data = transaction_data[i].split(",");
          if (i != 0) {
            cell_data[2] = "$" + cell_data[2].trim();
          }
          table_data += '<tr>';
          for (var cell_count = 0; cell_count < cell_data.length; cell_count++) {
            if (i === 0) {
              table_data += '<th>' + cell_data[cell_count] + '</th>';
            }
            else {
              table_data += '<td>' + cell_data[cell_count] + '</td>';
            }
          }
          table_data += '</tr>';
        }
        table_data += '</table>';
        page_data += table_data;
        // $('#expenseTable').html(table_data);
        let printWindow = window.open('', '_blank');
        printWindow.document.write(page_data);
        printWindow.document.close();
      }
    });
  }
  catch (err) {
    console.log(err.message);
  }
}

// $(document).ready(function () {
//   $('#expenses').onclick = function () {
//       const fs = require('fs');
//       const readline = require('readline');
//       let printableHTML = `
// <!DOCTYPE html>
// <html lang="en">
// <head>
//   <meta charset="UTF-8">
//   <title>Printable View</title>
//   <style>
//       body { background-color: #fff; color: black; filter: grayscale(100%); }
//       table { width: 80%; margin: auto; border-collapse: collapse; }
//       td, th { border: 1px solid black; text-align: center; padding: 5px; }
//       .header { text-align: center; margin-bottom: 20px; }
//       @media print {
//           body { -webkit-print-color-adjust: exact; }
//       }
//   </style>
// </head>
// <body>
//   <div class="header">
//       <h1>Transaction Entries</h1>
//   </div>
// `;
//       let name = 'JohnMcCarthy.txt';
//       let $table = $('<table>').css('width', '100%');
//       // Creating a readable stream from file 
//       // readline module reads line by line  
//       // but from a readable stream only. 
//       const file = readline.createInterface({
//           input: fs.createReadStream(name),
//           output: process.stdout,
//           terminal: false
//       });

//       // Printing the content of file line by 
//       //  line to console by listening on the 
//       // line event which will triggered 
//       // whenever a new line is read from 
//       // the stream 
//       file.on('line', (line) => {
//           let eachpart = line.split(",");
//           let $row = $('<tr>');
//           for (let i = 0; i < 4; i++) {
//               $row.append($("<td>").append(eachpart[index]));
//               index++;
//           }
//           $table.append($row);
//       });
//       printableHTML += $('<div>').append($table).html();
//       printableHTML += `</body></html>`;
//       let printWindow = window.open('', '_blank');
//       printWindow.document.write(printableHTML);
//       printWindow.document.close();
//   };
// });