<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            /* font-family: "THSarabunNew"; */
            margin: 0;
            padding-top: 0;
            font-size: 16px;
            text-align: left !important;
            font-weight: normal;
            line-height: 1.25;
        }

        p {
            margin: 0 0 5px 0;
            padding: 0;
        }

        td {
            vertical-align: top;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th style="width: 25%"><img src="https://pics2023bkk.com/img/logo.png" alt="" width="100%"></th>
                <th style="width: 25%"></th>
                <th style="width: 50%;text-align: left !important;">
                    <p>Pharmaceutical Inspection Co-operation Scheme (PIC/S) Seminar 2023 on Soft Skills that Make a
                        Good GMP/GDP Inspector in 2023</p>
                    <p>08 - 10 November 2023, Bangkok, Thailand</p>
                </th>
            </tr>
        </thead>
    </table>
    <p>Ref no: {{ $data->reference }}</p>
    <p>Date {{ date('d M Y', strtotime($data->updated_at)) }}</p>
    <p>Visa Section</p>
    <p>Thai Embassy</p>
    <br>
    <p><strong>Subject</strong>: Invitation Letter to PIC/S Seminar 2023 on Soft Skills that Make a Good GMP/GDP
        Inspector in 2023, Date 08 - 10 November 2023, Bangkok, Thailand.</p>
    <br>
    <p>We, Thai FDA, the Organizers of PIC/S Seminar 2023 on Soft Skills that Make a Good GMP/GDP Inspector in 2023,
        hereby certify that {{ $data->first_name }} {{ $data->last_name }} from {{ $data->organization }}
        {{ $data->country }} will be participating in PIC/S Seminar 2023.</p>
    <br>
    <p>This Seminar is scheduled to take place during 08 - 10 November 2023 at The Centara Grand and Bangkok Convention
        Centre at Central World, Bangkok, Thailand. The applicant information as below; </p>
    <br>
    <table style="width: 100%">
        <tbody>
            <tr>
                <td style="width: 60%">Title: {{ $data->title }} &nbsp;&nbsp;&nbsp;&nbsp; Surname:
                    {{ $data->last_name }}</td>
                <td style="width: 40%">Name: {{ $data->first_name }}</td>
            </tr>
            <tr>
                <td style="width: 60%">Organization Name: {{ $data->organization }}</td>
                <td style="width: 40%">Position: {{ $data->profession_title }}</td>
            </tr>
            <tr>
                <td style="width: 60%">Address: {{ $data->address }} {{ $data->city }} {{ $data->city_code }}</td>
                <td style="width: 40%">Country: {{ $data->country }}</td>
            </tr>
            <tr>
                <td style="width: 60%">Telephone: {{ $data->phone }}</td>
                <td style="width: 40%">Email: {{ $data->email }}</td>
            </tr>
            <tr>
                <td style="width: 60%">Nationality: {{ $data->members_visas[0]->nationality }}</td>
                <td style="width: 40%">Gender: {{ $data->members_visas[0]->gender }}</td>
            </tr>
            <tr>
                <td style="width: 60%">Identification Number: {{ $data->members_visas[0]->identification_number }}</td>
                <td style="width: 40%">Passport Number: {{ $data->members_visas[0]->passport_number }}</td>
            </tr>
            <tr>
                <td style="width: 60%">Date of Birth: {{ date('d M Y', strtotime($data->members_visas[0]->date_of_birth)) }}</td>
                <td style="width: 40%">Place of Birth: {{ $data->members_visas[0]->place_of_birth }}</td>
            </tr>
            <tr>
                <td style="width: 60%">Date of Issue: {{ date('d M Y', strtotime($data->members_visas[0]->passport_issue_date)) }}</td>
                <td style="width: 40%">Date of Expiry: {{ date('d M Y', strtotime($data->members_visas[0]->passport_expiry_date)) }}</td>
            </tr>
        </tbody>
    </table>
    <p>Issuing Authority of Passport:</p>
    <p>Duration of stay in Thailand: From {{ date('d M Y', strtotime($data->members_visas[0]->start_date)) }} to {{ date('d M Y', strtotime($data->members_visas[0]->end_date)) }}
    </p>
    <br>
    <p>We certify that the above statement is true and correct and look forward to welcoming the above delegate at our
        seminar in Bangkok.</p>
    <br>
    <p>Sincerely yours,</p>
    <p>Food and Drug Administration</p>
    <br>
    <p>Food and Drug Administration, Ministry of Public Health, Thailand (Thai FDA)</p>
    <p>88/24 Tiwanon Road, Nonthaburi, Thailand 11000</p>
    <p>T: <a href="tel:+6625907704">+(66) 2590 7704</a> </p>
    <p>Email: <a href="mailto:druginspection@fda.moph.go.th">druginspection@fda.moph.go.th</a></p>
    <p><a href="http://www.pics2023bkk.com ">www.pics2023bkk.com </a></p>
</body>

</html>
