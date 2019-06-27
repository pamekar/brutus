<table>
    <tr>
        <td align="center"><h1>{{config('app.name')}}</h1></td>
    </tr>
    <tr>
        <td align="center"><h3>You account has an issue.</h3></td>
    </tr>
    <tr>
        <td align="center"><p>We suspect that your account is being attacked by some malicious individuals, hence we've locked out login access for 5 minutes.</p>
            <p>Signed,<br><em>Security Dept,{{config('app.name')}}</em></p>
        </td>
    </tr>
    <tr>
        <td align="center">&copy; {{date('Y').", ".config('app.name')}}</td>
    </tr>
</table>