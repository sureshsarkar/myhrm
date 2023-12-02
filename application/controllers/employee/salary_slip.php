<?php 


 $invoiceTemplate = '
    <table border="0" align="center" width="100%" cellpadding="0" cellspacing="0" style="width:100%;">
        <tbody>
            <tr>
                <td>
                <table width="100%" cellspacing="0" cellpadding="0" style="width: 900px;">
                <tr>
                   <td style="width:180px;">
                        <img src="'.base_url().'assets/images/logo.jpg" style="width:170px;"/>
                   </td>

                    <td colspan="5">
                    <table width="100%" style="width: 700px;">
                    <tr>
                        <td style="margin-bottom: 15px;font-size: 15px; color: #000000; font-weight: 600;text-align: right;">HPR TECHCENTRICA PRIVATE LIMITED </td>
                    </tr>
                    <tr>
                        <td style="margin-bottom: 10px; line-height: 1.4; font-size: 14px; text-align: right;">
                         <b>CIN NUMBER:</b> U73100DL2014PTC267126 <b>GSTIN:</b><br>
                            09AADCH4032M1ZH <b>PAN: </b>AADCH4032M
                        </td>
                    </tr>
                    <tr>
                        <td style="margin-bottom: 10px; text-align: right;">
                            <b>Address:</b> H-73, Level 4, Sector 63, NOIDA, Uttar Pradesh 201301<br>
                            <b>Contact Number: </b>0120 505 8863
                        </td>
                    </tr>
                    <tr>
                        <td style="margin-bottom: 30px; text-align: right;">
                        <br>
                        <br>
                        </td>
                    </tr>
                </table>
                    </td>
                </tr>
                </table>
                    
                    <table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width: 900px; margin: auto;border: 2px solid black;">
                    <tr>
                       <td colspan="4" style="text-align: center; font-weight: 600; padding: 5px 0px;">PAY SLIP FOR THE MONTH OF SEP 2023</td>
                   </tr>
                    <tr style="height:25.9pt; -aw-height-rule:exactly">
                        <td colspan="0"
                            style="width:120.25pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                            <p style="font-size:10pt"><span style="font-family:system-ui">Employee Code </span></p>
                        </td>
                        <td
                            style="width:100.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                            <p style="font-size:10pt"><span style="font-family:system-ui">'.$employeeCode.'</span></p>
                        </td>
                        <td
                            style="width:100.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                            <p style="font-size:10pt"><span style="font-family:system-ui">Bank</span></p>
                        </td>
                        <td
                            style="width:120.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                            <p style="font-size:10pt"><span style="font-family:system-ui">'.$employeeBankName.'</span></p>
                        </td>
                    </tr>
                <tr style="height:24.95pt; -aw-height-rule:exactly">
                    <td
                        style="width:108.25pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">Name</span></p>
                    </td>
                    <td
                        style="width:82.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">'.$employeeName.'</span></p>
                    </td>
                    <td
                        style="width:80.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">Bank Account No. </span></p>
                    </td>
                    <td
                        style="width:95.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">'.$employeeBankAccount.'</span></p>
                    </td>
                </tr>
                <tr style="height:24.95pt; -aw-height-rule:exactly">
                    <td
                        style="width:108.25pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">Designation </span></p>
                    </td>
                    <td
                        style="width:82.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">'.$employeeRole.'</span></p>
                    </td>
                    <td
                        style="width:80.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">Location</span></p>
                    </td>
                    <td
                        style="width:95.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">Noida, U.P.</span></p>
                    </td>
                </tr>
                <tr style="height:25.9pt; -aw-height-rule:exactly">
                    <td
                        style="width:108.25pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">Date of Joining </span></p>
                    </td>
                    <td
                        style="width:82.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">'.$employeeJoinDate.'</span></p>
                    </td>
                    <td
                        style="width:80.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">Days In Month </span></p>
                    </td>
                    <td
                        style="width:95.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:12pt"><span style="-aw-import:ignore"></span></p>
                    </td>
                </tr>
                <tr style="height:25.45pt; -aw-height-rule:exactly">
                    <td
                        style="width:108.25pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">PAN No.</span></p>
                    </td>
                    <td
                        style="width:82.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">'.$employeePanNumber.'</span></p>
                    </td>
                    <td
                        style="width:80.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">Leave Without Pay (LWP)</span></p>
                    </td>
                    <td
                        style="width:95.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">'.$salaryPayWithoutLeave.'</span></p>
                    </td> 
                </tr>
                <tr style="height:25.45pt; -aw-height-rule:exactly">
                    <td
                        style="width:108.25pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">Attendance in Days </span></p>
                    </td>
                    <td
                        style="width:82.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">'.$salaryAttendanceDays.'</span></p>
                    </td>
                    <td
                        style="width:80.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui"></span></p>
                    </td>
                    <td
                        style="width:95.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui"></span></p>
                    </td> 
                </tr>
                <tr style="height:25.45pt; -aw-height-rule:exactly">
                    <td
                        style="width:108.25pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">Holidays </span></p>
                    </td>
                    <td
                        style="width:82.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui"></span></p>
                    </td>
                    <td
                        style="width:80.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">Paid Leaves (PL)</span></p>
                    </td>
                    <td
                        style="width:95.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="font-size:10pt"><span style="font-family:system-ui">'.$salaryPaidLeave.'</span></p>
                    </td> 
                </tr>
              
            </table>
            
            <table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width: 900px; margin: auto;">
               <tr>
                <td colspan="5">
                    <br/>
                    <br/>
                    </td>
                    </tr>
                <tr>
            </table>
                   <table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width: 900px; margin: auto;border: 2px solid black;">
                   <tr>

                   <td
                       style="width:82.3pt; border-top: 2px solid black;border-left: 2px solid black; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui"><b>EARNINGS</b></span></p>
                   </td>
                   <td
                       style="width:80.9pt; border-top: 2px solid black;border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:12pt"><span style="-aw-import:ignore">&#xa0;</span></p>
                   </td>
                   <td
                       style="width:95.3pt;border-top: 2px solid black; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui"></span></p>
                   </td>
                   <td
                       style="width:62.65pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:13px"><span style="-aw-import:ignore"><b>DEDUCTIONS</b></span></p>
                   </td>
                   <td
                       style="width:62.65pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:12pt"><span style="-aw-import:ignore">&#xa0;</span></p>
                   </td>
                  </tr>

               <tr>
                   <td
                       style="width:108.25pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui"><b>Head</b></span></p>
                   </td>
                   <td
                       style="width:82.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui"><b>Monthly Amount</b></span></p>
                   </td>
                   <td
                       style="width:80.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui"><b>Current Month</b></span></p>
                   </td>
                   <td
                       style="width:95.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui"><b>Heads</b></span></p>
                   </td>
                   <td
                       style="width:62.65pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui"><b>Amount</b></span></p>
                   </td>
               </tr>
               <tr style="height:25.9pt; -aw-height-rule:exactly">
                   <td
                       style="width:108.25pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">Basic</span></p>
                   </td>
                   <td
                       style="width:82.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:12pt"><span style="-aw-import:ignore">'.$salaryBasic.'</span></p>
                   </td>
                   <td
                       style="width:80.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:12pt"><span style="-aw-import:ignore">&#xa0;</span></p>
                   </td>
                   <td
                       style="width:95.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">TDS</span></p>
                   </td>
                   <td
                       style="width:62.65pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">'.$salaryTds.'</span></p>
                   </td>
               </tr>
               <tr style="height:24.95pt; -aw-height-rule:exactly">
                   <td
                       style="width:108.25pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">HRA</span></p>
                   </td>
                   <td
                       style="width:82.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">'.$salaryHra.'</span></p>
                   </td>
                   <td
                       style="width:80.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui"></span></p>
                   </td>
                   <td
                       style="width:95.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">Salary Advance</span></p>
                   </td>
                   <td
                       style="width:62.65pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">'.$salarySalaryAdvance.'</span></p>
                   </td>
               </tr>
               <tr style="height:24.95pt; -aw-height-rule:exactly">
                   <td
                       style="width:108.25pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">Conveyance Allowance</span></p>
                   </td>
                   <td
                       style="width:82.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">'.$salaryConveAllowance.'</span></p>
                   </td>
                   <td
                       style="width:80.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui"></span></p>
                   </td>
                   <td
                       style="width:95.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">Other Deduction</span></p>
                   </td>
                   <td
                       style="width:62.65pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui"></span></p>
                   </td>
               </tr>
               <tr style="height:25.9pt; -aw-height-rule:exactly">
                   <td
                       style="width:108.25pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">Special Allowance</span></p>
                   </td>
                   <td
                       style="width:82.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">'.$salarySpecialAllowance.'</span></p>
                   </td>
                   <td
                       style="width:80.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui"></span></p>
                   </td>
                   <td
                       style="width:95.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:12pt"><span style="-aw-import:ignore"></span></p>
                   </td>
                   <td
                       style="width:62.65pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:12pt"><span style="-aw-import:ignore"></span></p>
                   </td>
               </tr>
               <tr style="height:25.45pt; -aw-height-rule:exactly">
                   <td
                       style="width:108.25pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">Compensation</span></p>
                   </td>
                   <td
                       style="width:82.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">'.$salaryCompensation.'</span></p>
                   </td>
                   <td
                       style="width:80.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui"></span></p>
                   </td>
                   <td
                       style="width:95.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">Leave Without Pay</span></p>
                   </td>
                   <td
                       style="width:62.65pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">'.$salaryCasualLeaveAmount.'</span></p>
                   </td>
               </tr>
   
               
               <tr style="height:18.7pt; -aw-height-rule:exactly">
                   <td
                       style="width:108.25pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">TOTAL EARNINGS</span></p>
                   </td>
                   <td
                       style="width:82.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:12pt"><span style="-aw-import:ignore">'.$salaryTotalEarning.'</span></p>
                   </td>
                   <td
                       style="width:80.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:12pt"><span style="-aw-import:ignore">&#xa0;</span></p>
                   </td>
                   <td
                       style="width:95.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">TOTAL DEDUCTION</span></p>
                   </td>
                   <td
                       style="width:62.65pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                       <p style="font-size:10pt"><span style="font-family:system-ui">'.$salaryTotalEeduction.'</span></p>
                   </td>
               </tr>
               <tr style="height:18.7pt; -aw-height-rule:exactly">
                <td colspan="2"
                    style="width:108.25pt; border-style:none; border-width:0.75pt; padding-top:5px; padding-bottom:5px; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                    <p style="font-size:10pt"><span style="font-family:system-ui">NET SALARY PAYABLE:</span></p>
                </td>
                <td
                    style="width:80.9pt; border-style:none; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                    <p style="font-size:12pt"><span style="-aw-import:ignore"></span></p>
                </td>
                <td
                    style="width:95.3pt; border-style:none; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                    <p style="font-size:10pt"><span style="font-family:system-ui"> </span></p>
                </td>
                <td
                    style="width:62.65pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                    <p style="font-size:10pt"><span style="font-family:system-ui">'.$salaryNetSalary.'/-</span></p>
                </td>
            </tr>
              
           </table>
           
                    <table border="0" align="center" width="100%" cellpadding="0" cellspacing="0" style="width:900px;">
                        <tbody>
                            <tr>
                                <td colspan="5" style="text-align: left; font-size: 13px; font-family: system-ui;">
                                 <br/>
                                 <br/>
                                 <br/>
                                    “This is a computer-generated slip and sent to employees on their official e-mail id only, therefore doesnot require signature”
                                 <br/>
                                 <br/>
                                 <br/>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: center;">
                                    <br/>
                                    <br/>
                                    <img  src="https://www.validatek.com/sites/default/files/wysiwyg/images/53737-IT%20Service%20Projects%20-%20CMMI%20Services%20V2.0%20%28CMMI-SVC%29%20without%20SAM%20-%20Maturity%20Level%205-Color.png" style="text-align: center;width: 25%;" >
                                    <br/>
                                    <br/>
                                </td>
                            </tr>

                                <tr>
                                <td colspan="5" style="text-align: center; font-size: 13px; font-family: system-ui;">
                                <br/>
                                <br/>
                                        H-73, 4th Floor, Sector 63 Noida 201301 India | 19 Flicka Boulevard Cranbourne West 3977 Melbourne<br>
                                        Australia Regd. Office: Block I, Pocket-1, Sectors 16, Rohini, Delhi, India, 110085<br>
                                        Contact Number: 0120 505 8863 | E Mail: info@techcentrica.com | Website: www.techcentrica.com<br>
                                    <br/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
'; ?>