<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$json = '[
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "Kaustinen web app",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "allowed_clients": [],
    "allowed_logout_urls": [
      "http://localhost",
      "http://127.0.0.1:3000",
      "https://kausti.com",
      "http://localhost:3000",
      "http://localhost:3000/manual.php",
      "http://localhost/auth0",
      "http://jwt.io"
    ],
    "callbacks": [
      "https://sptest.iamshowcase.com/ixs?idp=d487f7436496828a9d090c932d52315a62d6c8eb",
      "http://localhost",
      "http://127.0.0.1:3000/callback",
      "http://127.0.0.1:3000",
      "https://oauth.pstmn.io/v1/callback",
      "http://localhost:3000",
      "http://localhost:3000/callback",
      "http://localhost:3000/manual.php",
      "http://localhost/auth0",
      "http://localhost/auth0/implicit",
      "http://localhost/auth0/implicit.php",
      "http://jwt.io"
    ],
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "logo_uri": "",
    "require_pushed_authorization_requests": false,
    "addons": {},
    "organization_require_behavior": "no_prompt",
    "organization_usage": "deny",
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "d5AuU6aAoQq4G8tPeWlHNMg9mQJ5Vr1y",
    "callback_url_template": false,
    "client_secret": "ZGHof2CjyNfw6X6Q0s72J-XY71fNYKJWy7TcPQGztei49rDZunERP7RWWsJ5sjwq",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 1,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "regular_web",
    "grant_types": [
      "implicit",
      "authorization_code",
      "refresh_token",
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "zzzzzz M2M Postman",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "allowed_clients": [],
    "callbacks": [],
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "Yzja93Q0R2TkJR8LSIOf4n9WMBaZGSRz",
    "callback_url_template": false,
    "client_secret": "9VAqAX_ZAxd3UeFH6r2O3tDWswkVUKylUEW32vBdUSasllYglHgBVf6S5rlx1Zou",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "non_interactive",
    "grant_types": [
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "zzzzzz Localhost Auth0 API (Test Application)",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "allowed_clients": [],
    "callbacks": [],
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "QtrpvMOJb30utLiSAz4qHQkmx8ASoAV2",
    "callback_url_template": false,
    "client_secret": "CLaFCqm2nQbf2Yuqbb2PQMiQHwDj4G4Tuu89vi6vDYYysPl6F0_gMlaslxVRFdvb",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "non_interactive",
    "grant_types": [
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "PKCE Test",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "expiring",
      "leeway": 0,
      "token_lifetime": 2592000,
      "idle_token_lifetime": 1296000,
      "infinite_token_lifetime": false,
      "infinite_idle_token_lifetime": false,
      "rotation_type": "rotating"
    },
    "allowed_clients": [],
    "allowed_logout_urls": [
      "http://localhost/auth0"
    ],
    "callbacks": [
      "http://localhost/auth0"
    ],
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "d7wpRNvlezrA0FfSNYcHfAfELN6mKAW6",
    "callback_url_template": false,
    "client_secret": "kBMtLc6j79XyvUrgaxjWuDc1BXebYbOS9lA2AEChIr8fWnWLARWr328qUB2Li46C",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "none",
    "app_type": "spa",
    "grant_types": [
      "authorization_code",
      "implicit",
      "refresh_token"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "zzzzzz auth0-account-link",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "allowed_clients": [],
    "callbacks": [],
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "cSRuFixHOpBNLVH2Hvs6L47rRw6w1zpx",
    "callback_url_template": false,
    "client_secret": "KFaHAqfL9FUDr8wbkQtvnprY5QZf80RkY8DId7AzCEcbiOip9VSSui-0r-l36zse",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "client_secret_post",
    "grant_types": [
      "authorization_code",
      "implicit",
      "refresh_token",
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "zzzzzz API Explorer Application",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "allowed_clients": [],
    "callbacks": [],
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "2PDM4nvZNtPs12qhYkoNWxzNRFDXw9P6",
    "callback_url_template": false,
    "client_secret": "Zn62SRowaqv97muiUnp7L9eAHYsJ5MkTlblvkK8sBKa85II28AF_G1dt_-TIb1Cl",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "non_interactive",
    "grant_types": [
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "PAR Demo",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "allowed_clients": [],
    "callbacks": [
      "http://localhost/auth0"
    ],
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "require_pushed_authorization_requests": true,
    "allowed_logout_urls": [
      "http://localhost/auth0"
    ],
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "j68KgrFlrknel3QpFuH4rZFgxVEgCxzf",
    "callback_url_template": false,
    "client_secret": "VwwG9DG6T99mXKZkiQBV9-4xAYMHaA0ytGXn1R19UYsxF70tFn3wYU-5ED0IbNLQ",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "regular_web",
    "grant_types": [
      "authorization_code",
      "implicit",
      "refresh_token",
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "zzzzzz Native app demo",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 2592000,
      "idle_token_lifetime": 1296000,
      "rotation_type": "non-rotating"
    },
    "allowed_clients": [],
    "callbacks": [],
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "1niCyOXXUDBfRfmRnUjtHl0OCwlFFL1K",
    "callback_url_template": false,
    "client_secret": "2yECdnWYuTYzeeuUnVoIwJrQgXVdoOo-Bh3pm03JYdqIuECRp_j1ACylujuBTqKr",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "none",
    "app_type": "native",
    "grant_types": [
      "authorization_code",
      "implicit",
      "refresh_token",
      "urn:ietf:params:oauth:grant-type:device_code"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "MFA Demo",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "allowed_clients": [],
    "callbacks": [
      "http://localhost/auth0"
    ],
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "allowed_logout_urls": [
      "http://localhost/auth0"
    ],
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "PPHfuzUVkZ2OnQt3e8GjIt4kTihPegVB",
    "callback_url_template": false,
    "client_secret": "RtTZxi_bYCYJEyGrpCzGUzJcY0__gyK1_suaBAUfv41wTLaVYmwMcGEkobh6szeF",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "regular_web",
    "grant_types": [
      "authorization_code",
      "implicit",
      "refresh_token",
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "Fortress BI",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "organization_require_behavior": "post_login_prompt",
    "organization_usage": "require",
    "allowed_clients": [],
    "allowed_logout_urls": [
      "http://localhost/auth0",
      "http://localhost/auth0?logout=true",
      "https://kaustinen.cic-demo-platform.auth0app.com/logout",
      "http://127.0.0.1:3000/logout"
    ],
    "callbacks": [
      "http://localhost/auth0",
      "http://127.0.0.1:3000/callback"
    ],
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "logo_uri": "https://kausti.com/icons8/castle.png",
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "mEfDBs83wcGgGv5vLNF1fILbWdMpt5T1",
    "callback_url_template": false,
    "client_secret": "u1mG4j-7wOEWLhOhOmahQpZFmc7UAfebb27o3H0Yw3maT0OScr8yeMt80R9ZwGK4",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "regular_web",
    "grant_types": [
      "authorization_code",
      "implicit",
      "refresh_token",
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "zzzzzz Lock test",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "expiring",
      "leeway": 0,
      "token_lifetime": 2592000,
      "idle_token_lifetime": 1296000,
      "infinite_token_lifetime": false,
      "infinite_idle_token_lifetime": false,
      "rotation_type": "rotating"
    },
    "allowed_clients": [],
    "callbacks": [
      "http://localhost:3000"
    ],
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "allowed_logout_urls": [
      "http://localhost:3000"
    ],
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "nGWWEF6F50RxI2NgWvYTAQ5bYahZ6dDj",
    "callback_url_template": false,
    "client_secret": "GDf0JwbrecIXvb8_lpPNG0jlHbJMiitbbrhV5YD0mt0Et_biwfTPJkJC7jtTvAvS",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "none",
    "app_type": "spa",
    "grant_types": [
      "authorization_code",
      "implicit",
      "refresh_token"
    ],
    "web_origins": [
      "http://localhost:3000"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "async_approval_notification_channels": [
      "guardian-push"
    ],
    "name": "School SaaS CRM",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "organization_require_behavior": "post_login_prompt",
    "organization_usage": "require",
    "allowed_clients": [],
    "callbacks": [
      "http://localhost/auth0"
    ],
    "logo_uri": "https://kausti.com/icons8/school.png",
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "allowed_logout_urls": [
      "http://localhost/auth0"
    ],
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "wuDzkJv36DkY4FKHjy6eSPw5lIQpID9X",
    "callback_url_template": false,
    "client_secret": "CZp895-9Y5fn-7Q4IYWh3HgT9nzP7HmuZz2veetRFyx-IYwYFSU54z_2QGGGaYUa",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "regular_web",
    "grant_types": [
      "authorization_code",
      "implicit",
      "refresh_token",
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "async_approval_notification_channels": [
      "guardian-push"
    ],
    "name": "zzzzzz Astronaut School API (Test Application)",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "allowed_clients": [],
    "callbacks": [],
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "9YRi2RY8JWMTJbZmFEzJJCEEXrLLzfRq",
    "callback_url_template": false,
    "client_secret": "7V8S19hkVxtmDA6g_HgA8rYUutRLh1jCzCM3UpKLBent1ECu_EUradX-lqZpOHwh",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "non_interactive",
    "grant_types": [
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "async_approval_notification_channels": [
      "guardian-push"
    ],
    "name": "Pulse SaaS",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "organization_require_behavior": "post_login_prompt",
    "organization_usage": "require",
    "allowed_clients": [],
    "callbacks": [
      "http://localhost/auth0"
    ],
    "logo_uri": "https://kausti.com/icons8/pulse.png",
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "allowed_logout_urls": [
      "http://localhost/auth0",
      "https://kaustinen.cic-demo-platform.auth0app.com/logout",
      "http://localhost/auth0?logout=true"
    ],
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "ceuq0b4MZDrwh6M8LOtSWXLZvYtjzwAm",
    "callback_url_template": false,
    "client_secret": "fLe0HW211lnksWQD62Bq13Z-dRP6GiaUJ6dZIrGczAYubP67aZaRiWJkxPlDlU1A",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "regular_web",
    "grant_types": [
      "authorization_code",
      "implicit",
      "refresh_token",
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "async_approval_notification_channels": [
      "guardian-push"
    ],
    "name": "zzzzzz Kalles Bilservice AB",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "allowed_clients": [],
    "callbacks": [],
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "GLNOsZ6k9rnGb0q3FGMc4TurTYV82UEy",
    "callback_url_template": false,
    "client_secret": "rKg1-atZAlaarC2eiwDCzUeRRxPrvQ2YVqAj4gMdyRb0DCYHQigZf7gBav6DQl4Y",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "non_interactive",
    "grant_types": [
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "async_approval_notification_channels": [
      "guardian-push"
    ],
    "name": "CLI test",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "allowed_clients": [],
    "callbacks": [],
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "xYbXPDvJsKMA91gaiQlU31Crpo4K09Uu",
    "callback_url_template": false,
    "client_secret": "w4alcP_ToHBpPsR7XFq18n5ex5KBSprAQXwEJy7JBQch9kl_VgjA_YoWKoM0BIzC",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "non_interactive",
    "grant_types": [
      "authorization_code",
      "implicit",
      "refresh_token",
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "API Explorer Application",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "XIeXgaddkBkVoYcRTeZBHVgftL6La94V",
    "callback_url_template": false,
    "client_secret": "W4lMlevYNNLAOC0MbmYPJdUY1oB4RT5WENThldubQYcVGAKorlqaOK-y6vBvi3SU",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "non_interactive",
    "grant_types": [
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "Custom Token Exchange",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "allowed_clients": [],
    "callbacks": [
      "http://myapp.local.com/auth0"
    ],
    "native_social_login": {
      "apple": {
        "enabled": false
      },
      "facebook": {
        "enabled": false
      }
    },
    "async_approval_notification_channels": [
      "guardian-push"
    ],
    "token_exchange": {
      "allow_any_profile_of_type": [
        "custom_authentication"
      ]
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "3bVlSzteCJ3QP6MbM00jceqXXFs1qfGg",
    "callback_url_template": false,
    "client_secret": "r8-gdJs14wCNzPhy26Oq6AzJ6vY4MkqALVLkScQ8M0ZI3SzKHNqrUHaSZHkZkJ6p",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "client_aliases": [],
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "non_interactive",
    "grant_types": [
      "client_credentials",
      "urn:auth0:params:oauth:grant-type:token-exchange:federated-connection-access-token",
      "password",
      "http://auth0.com/oauth/grant-type/password-realm",
      "urn:okta:params:oauth:grant-type:webauthn",
      "refresh_token",
      "urn:openid:params:grant-type:ciba",
      "authorization_code",
      "implicit",
      "http://auth0.com/oauth/grant-type/mfa-oob",
      "http://auth0.com/oauth/grant-type/mfa-otp",
      "http://auth0.com/oauth/grant-type/mfa-recovery-code"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "Custom Token Exchange API (Test Application)",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "7tuUabVN3vw3K7IlvbrmeGUJ8H450Mxj",
    "callback_url_template": false,
    "client_secret": "eblbWM4hJ5WyTmMv0xpy_mHwCcHJ-V2uPHaxsGVbAuToGFuf3wnJnRBX9qoF1s_3",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "non_interactive",
    "grant_types": [
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "Custom Token Exchange GetInfo API (Test Application)",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "IBseAyAxSYIQeUAK1ri138IthQB396Mc",
    "callback_url_template": false,
    "client_secret": "YhuykaUox1W6oiqwabhm2SAU7FROAa-6mtyqDGXij1xM2xKOyVfhqtOmBDTy_UJF",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "non_interactive",
    "grant_types": [
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "Custom Token Exchange Downstream example",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "token_exchange": {
      "allow_any_profile_of_type": [
        "custom_authentication"
      ]
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "9PKHTMwv9Ss50lRkZV2bs4FJxDSW1Sat",
    "callback_url_template": false,
    "client_secret": "vJzmGVvf2PtOIUFQwV3Up-VuEmK_umvfb9EuIwZKwCXWD9NyQAbqegJR5AO9Si65",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "non_interactive",
    "grant_types": [
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "Custom Token Exchange Downstream API (Test Application)",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "ekB9IUDzeTdnP5i5zR9NXUUHJKF6hmcS",
    "callback_url_template": false,
    "client_secret": "KFFQPf85Fg9CSTbe-scWOXglHHlrbtjkLxf_FBDo5JA63kSFT3k02j0TR_fU_GZT",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "non_interactive",
    "grant_types": [
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "MCP Inspector",
    "callbacks": [
      "http://localhost:6274/oauth/callback",
      "http://localhost:6274/oauth/callback/debug"
    ],
    "oidc_conformant": true,
    "is_first_party": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 2592000,
      "idle_token_lifetime": 1296000,
      "rotation_type": "non-rotating"
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "DsvR5DOGSRr7VS3Nw6gHdkNgkSIYLjD0",
    "callback_url_template": false,
    "client_secret": "-lYLyh0554EayBV8JyXFMp6Qj1kpI3AvHJTycXkHDoXUwVzz13hLBCo9gMDRQI8s",
    "jwt_configuration": {
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "token_endpoint_auth_method": "none",
    "grant_types": [
      "authorization_code",
      "refresh_token"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "MCP Inspector",
    "callbacks": [
      "http://localhost:6274/oauth/callback",
      "http://localhost:6274/oauth/callback/debug"
    ],
    "oidc_conformant": true,
    "is_first_party": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 2592000,
      "idle_token_lifetime": 1296000,
      "rotation_type": "non-rotating"
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "dOm3x4kN8iEfKdWCvuYm0TZ2sZluNlDQ",
    "callback_url_template": false,
    "client_secret": "eqWEAC1za844CMDeORmkUzLiR6Zvzoxc6k3c3bcLvKflwehIqi4vIBhV34F8XCCQ",
    "jwt_configuration": {
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "token_endpoint_auth_method": "none",
    "grant_types": [
      "authorization_code",
      "refresh_token"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "MCP Inspector",
    "callbacks": [
      "http://localhost:6274/oauth/callback",
      "http://localhost:6274/oauth/callback/debug"
    ],
    "oidc_conformant": true,
    "is_first_party": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 2592000,
      "idle_token_lifetime": 1296000,
      "rotation_type": "non-rotating"
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "exFs4XMoT5W7sXbPOHr4mqynYYC7FVNM",
    "callback_url_template": false,
    "client_secret": "C5cU7mSeuPzgvXYjgxIb1WOw1uqLCl1O4ibObwbTKuo1SV-hQ1hk9AlksxzgvKTH",
    "jwt_configuration": {
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "token_endpoint_auth_method": "none",
    "grant_types": [
      "authorization_code",
      "refresh_token"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "MCP Inspector",
    "callbacks": [
      "http://localhost:6274/oauth/callback",
      "http://localhost:6274/oauth/callback/debug"
    ],
    "oidc_conformant": true,
    "is_first_party": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 2592000,
      "idle_token_lifetime": 1296000,
      "rotation_type": "non-rotating"
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "CZb0QACa9tFEfMmcvUmAA1DoE8MzFrFD",
    "callback_url_template": false,
    "client_secret": "-gUtdWVRlf9L4ew4pvOh1B0DnDog8Wnm__g8ZLe9P3Iwq6RoO_mXGnyk4pEBSx_W",
    "jwt_configuration": {
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "token_endpoint_auth_method": "none",
    "grant_types": [
      "authorization_code",
      "refresh_token"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "MCP Inspector",
    "callbacks": [
      "http://localhost:6274/oauth/callback",
      "http://localhost:6274/oauth/callback/debug"
    ],
    "oidc_conformant": true,
    "is_first_party": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 2592000,
      "idle_token_lifetime": 1296000,
      "rotation_type": "non-rotating"
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "uJ1rg2pxfivAXuZDzRaa7meWq19IanPt",
    "callback_url_template": false,
    "client_secret": "1vtRGWAVuECWeKytWYkaPUJfh6zCv0ybhj4Dy3kMJDTeMgettCtTnM43NKmKkS1U",
    "jwt_configuration": {
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "token_endpoint_auth_method": "none",
    "grant_types": [
      "authorization_code",
      "refresh_token"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "http://localhost:3000/api/accounts/transfers (Test Application)",
    "is_first_party": true,
    "oidc_conformant": true,
    "cross_origin_authentication": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 31557600,
      "idle_token_lifetime": 2592000,
      "rotation_type": "non-rotating"
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "UtnCsyCqyigZuiexKhkXM3rwWtKQHYY7",
    "callback_url_template": false,
    "client_secret": "hPI-f7SfbbQfMQOfB1D8u9E--k-YkiHrJuLkhOYtX6hNUBElKhlKoSK5s53rZVKV",
    "jwt_configuration": {
      "alg": "RS256",
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "token_endpoint_auth_method": "client_secret_post",
    "app_type": "non_interactive",
    "grant_types": [
      "client_credentials"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "MCP Inspector",
    "callbacks": [
      "http://localhost:6274/oauth/callback",
      "http://localhost:6274/oauth/callback/debug"
    ],
    "oidc_conformant": true,
    "is_first_party": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 2592000,
      "idle_token_lifetime": 1296000,
      "rotation_type": "non-rotating"
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "LwIFlcZ9Fu4yn96KM1DRBQ0kt8CeNxK0",
    "callback_url_template": false,
    "client_secret": "jqLxTCvs7aXevpa6ZPZOVUlrdqr0dHFMZdd66SmylvZ73QMYSxSEq4N8oyvetLx8",
    "jwt_configuration": {
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "token_endpoint_auth_method": "none",
    "grant_types": [
      "authorization_code",
      "refresh_token"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "MCP Inspector",
    "callbacks": [
      "http://localhost:6274/oauth/callback",
      "http://localhost:6274/oauth/callback/debug"
    ],
    "oidc_conformant": true,
    "is_first_party": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 2592000,
      "idle_token_lifetime": 1296000,
      "rotation_type": "non-rotating"
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "gAbHtNG7aXkgiJbgaSdB2crHoQT0ehla",
    "callback_url_template": false,
    "client_secret": "s0HDVwT2lfiwqkudyru9nkhkMXEGIOZ6VBEFUdatak2NrC4rTBV75McRovc-O8lK",
    "jwt_configuration": {
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "token_endpoint_auth_method": "none",
    "grant_types": [
      "authorization_code",
      "refresh_token"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": false,
    "is_token_endpoint_ip_header_trusted": false,
    "name": "MCP Inspector",
    "callbacks": [
      "http://localhost:6274/oauth/callback",
      "http://localhost:6274/oauth/callback/debug"
    ],
    "oidc_conformant": true,
    "is_first_party": false,
    "sso_disabled": false,
    "cross_origin_auth": false,
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 2592000,
      "idle_token_lifetime": 1296000,
      "rotation_type": "non-rotating"
    },
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "oEatqc04M2CSBZn6EjEnmYIGAHDcKOpr",
    "callback_url_template": false,
    "client_secret": "xKkNMe_1et_W9pi_2Pkvto9vgzODoeL5DtSk-hYSBSrYlp7fDHCzz04JQZ-v364B",
    "jwt_configuration": {
      "lifetime_in_seconds": 36000,
      "secret_encoded": false
    },
    "token_endpoint_auth_method": "none",
    "grant_types": [
      "authorization_code",
      "refresh_token"
    ],
    "custom_login_page_on": true
  },
  {
    "tenant": "kaustinen",
    "global": true,
    "callbacks": [],
    "is_first_party": true,
    "name": "All Applications",
    "refresh_token": {
      "expiration_type": "non-expiring",
      "leeway": 0,
      "infinite_token_lifetime": true,
      "infinite_idle_token_lifetime": true,
      "token_lifetime": 2592000,
      "idle_token_lifetime": 1296000,
      "rotation_type": "non-rotating"
    },
    "owners": [
      "oidc|demo-platform|oidc|Okta|00u1w83x0pkAyejBK1d8"
    ],
    "signing_keys": [
      {
        "cert": "-----BEGIN CERTIFICATE-----\r\nMIIDKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNV\r\nBAMTKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcN\r\nMjUwOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGlu\r\nZW4uY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0B\r\nAQEFAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXp\r\nt+uJk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkL\r\nhISfzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyL\r\nH227DJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+W\r\nTQ7BYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l9\r\n3qAkde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNV\r\nHRMBAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNV\r\nHQ8BAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3Ree\r\nRN4W9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oi\r\nmh21otJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPT\r\nhkS3R56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs\r\n2xm/txTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQ\r\nbRW/OMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4=\r\n-----END CERTIFICATE-----",
        "pkcs7": "-----BEGIN PKCS7-----\r\nMIIDWgYJKoZIhvcNAQcCoIIDSzCCA0cCAQExADALBgkqhkiG9w0BBwGgggMvMIID\r\nKzCCAhOgAwIBAgIJb4aYF5nkSJEsMA0GCSqGSIb3DQEBCwUAMDMxMTAvBgNVBAMT\r\nKGthdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20wHhcNMjUw\r\nOTAxMTQzNjA3WhcNMzkwNTExMTQzNjA3WjAzMTEwLwYDVQQDEyhrYXVzdGluZW4u\r\nY2ljLWRlbW8tcGxhdGZvcm0uYXV0aDBhcHAuY29tMIIBIjANBgkqhkiG9w0BAQEF\r\nAAOCAQ8AMIIBCgKCAQEA1CuIiPDnmbXPohhfTWF1hYor5RQlrqyzSuYsDTXpt+uJ\r\nk/m69Di7PorZujIrsrVlNU5kgvBvrLDwwr0qOl4ColzwWwha4y4yyJ//bxkLhISf\r\nzXisiUVc7iTZP+gupTqOz14HPSshncOxkeZ4+pAVVOfjUdyKLdqIv5VWSGyLH227\r\nDJ1Cp58QjYlfHxl4xB1++IzXYEAQ/RLFHrWY2h93Uiyar2cSsTKRVmSMWs+WTQ7B\r\nYACRECCV0rYRwfuaPr1gy54/nmaqQnMbc8ZNL72RYCDcEQLZWAvAHgSji1l93qAk\r\nde1GJcTgVq4LgCmos9fSWqu+xSyLXCfbBTAkJ80tCQIDAQABo0IwQDAPBgNVHRMB\r\nAf8EBTADAQH/MB0GA1UdDgQWBBTgQ+UH6qPbVpyyNsvmpvcgC3u9STAOBgNVHQ8B\r\nAf8EBAMCAoQwDQYJKoZIhvcNAQELBQADggEBAJIyxFEGouAE+PK5IUnb3ReeRN4W\r\n9DXFCiOQ8kqeFso9lM/vA9UFXq4+EKglRxzi6pou+KJIrP+gmBlnWtMr57Oimh21\r\notJ2/9XqfFl6haPPE9+h3psOvSJ0oXFQZV7BGv3/+WoaVZdDEe2OzybL5lPThkS3\r\nR56cO/ewmcgwkjTg/miDd2c2RZLWO7ixTcb6lcpuKOpt2oRz0SPyVIFtSEXs2xm/\r\ntxTknapvj5ySuOMjIqlSdpjBUv7QqVfE+GjWAIISLAlBLXitBSJ8ND3Q6LNQbRW/\r\nOMs9E3dqqXxtPCmye/7bfDuTKKcQZAvbECIw/zh+956Hus7PE2/FXRXEfQ4xAA==\r\n-----END PKCS7-----\r\n",
        "subject": "deprecated"
      }
    ],
    "client_id": "rAwgZ4xMbAH9oCrxQN7aojJOSvkevuyk",
    "client_secret": "VPEa09iIr5aOJgD41ii-lTIjNmVXAoixz2p9Eb6I6omvuG0jaaFv4aDbEVMPsOpL"
  }
]';

$i=0;
// --- Step 1: Define your Management API Token ---
// IMPORTANT: Replace this with a valid token from your Auth0 Dashboard.
// For production, you should load this from a secure environment variable, not hardcode it.
$apiToken = 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6IjNILWdmOGVqMkJBY3hRUWdoQ01sRyJ9.eyJpc3MiOiJodHRwczovL2thdXN0aW5lbi5jaWMtZGVtby1wbGF0Zm9ybS5hdXRoMGFwcC5jb20vIiwic3ViIjoiWEllWGdhZGRrQmtWb1ljUlRlWkJIVmdmdEw2TGE5NFZAY2xpZW50cyIsImF1ZCI6Imh0dHBzOi8va2F1c3RpbmVuLmNpYy1kZW1vLXBsYXRmb3JtLmF1dGgwYXBwLmNvbS9hcGkvdjIvIiwiaWF0IjoxNzY5Njg4MTMzLCJleHAiOjE3Njk3NzQ1MzMsInNjb3BlIjoicmVhZDpjbGllbnRfZ3JhbnRzIGNyZWF0ZTpjbGllbnRfZ3JhbnRzIGRlbGV0ZTpjbGllbnRfZ3JhbnRzIHVwZGF0ZTpjbGllbnRfZ3JhbnRzIHJlYWQ6dXNlcnMgdXBkYXRlOnVzZXJzIGRlbGV0ZTp1c2VycyBjcmVhdGU6dXNlcnMgcmVhZDp1c2Vyc19hcHBfbWV0YWRhdGEgdXBkYXRlOnVzZXJzX2FwcF9tZXRhZGF0YSBkZWxldGU6dXNlcnNfYXBwX21ldGFkYXRhIGNyZWF0ZTp1c2Vyc19hcHBfbWV0YWRhdGEgcmVhZDp1c2VyX2N1c3RvbV9ibG9ja3MgY3JlYXRlOnVzZXJfY3VzdG9tX2Jsb2NrcyBkZWxldGU6dXNlcl9jdXN0b21fYmxvY2tzIGNyZWF0ZTp1c2VyX3RpY2tldHMgcmVhZDpjbGllbnRzIHVwZGF0ZTpjbGllbnRzIGRlbGV0ZTpjbGllbnRzIGNyZWF0ZTpjbGllbnRzIHJlYWQ6Y2xpZW50X2tleXMgdXBkYXRlOmNsaWVudF9rZXlzIGRlbGV0ZTpjbGllbnRfa2V5cyBjcmVhdGU6Y2xpZW50X2tleXMgcmVhZDpjbGllbnRfY3JlZGVudGlhbHMgdXBkYXRlOmNsaWVudF9jcmVkZW50aWFscyBkZWxldGU6Y2xpZW50X2NyZWRlbnRpYWxzIGNyZWF0ZTpjbGllbnRfY3JlZGVudGlhbHMgcmVhZDpjb25uZWN0aW9ucyB1cGRhdGU6Y29ubmVjdGlvbnMgZGVsZXRlOmNvbm5lY3Rpb25zIGNyZWF0ZTpjb25uZWN0aW9ucyByZWFkOnJlc291cmNlX3NlcnZlcnMgdXBkYXRlOnJlc291cmNlX3NlcnZlcnMgZGVsZXRlOnJlc291cmNlX3NlcnZlcnMgY3JlYXRlOnJlc291cmNlX3NlcnZlcnMgcmVhZDpkZXZpY2VfY3JlZGVudGlhbHMgdXBkYXRlOmRldmljZV9jcmVkZW50aWFscyBkZWxldGU6ZGV2aWNlX2NyZWRlbnRpYWxzIGNyZWF0ZTpkZXZpY2VfY3JlZGVudGlhbHMgcmVhZDpydWxlcyB1cGRhdGU6cnVsZXMgZGVsZXRlOnJ1bGVzIGNyZWF0ZTpydWxlcyByZWFkOnJ1bGVzX2NvbmZpZ3MgdXBkYXRlOnJ1bGVzX2NvbmZpZ3MgZGVsZXRlOnJ1bGVzX2NvbmZpZ3MgcmVhZDpob29rcyB1cGRhdGU6aG9va3MgZGVsZXRlOmhvb2tzIGNyZWF0ZTpob29rcyByZWFkOmFjdGlvbnMgdXBkYXRlOmFjdGlvbnMgZGVsZXRlOmFjdGlvbnMgY3JlYXRlOmFjdGlvbnMgcmVhZDplbWFpbF9wcm92aWRlciB1cGRhdGU6ZW1haWxfcHJvdmlkZXIgZGVsZXRlOmVtYWlsX3Byb3ZpZGVyIGNyZWF0ZTplbWFpbF9wcm92aWRlciBibGFja2xpc3Q6dG9rZW5zIHJlYWQ6c3RhdHMgcmVhZDppbnNpZ2h0cyByZWFkOnRlbmFudF9zZXR0aW5ncyB1cGRhdGU6dGVuYW50X3NldHRpbmdzIHJlYWQ6bG9ncyByZWFkOmxvZ3NfdXNlcnMgcmVhZDpzaGllbGRzIGNyZWF0ZTpzaGllbGRzIHVwZGF0ZTpzaGllbGRzIGRlbGV0ZTpzaGllbGRzIHJlYWQ6YW5vbWFseV9ibG9ja3MgZGVsZXRlOmFub21hbHlfYmxvY2tzIHVwZGF0ZTp0cmlnZ2VycyByZWFkOnRyaWdnZXJzIHJlYWQ6Z3JhbnRzIGRlbGV0ZTpncmFudHMgcmVhZDpndWFyZGlhbl9mYWN0b3JzIHVwZGF0ZTpndWFyZGlhbl9mYWN0b3JzIHJlYWQ6Z3VhcmRpYW5fZW5yb2xsbWVudHMgZGVsZXRlOmd1YXJkaWFuX2Vucm9sbG1lbnRzIGNyZWF0ZTpndWFyZGlhbl9lbnJvbGxtZW50X3RpY2tldHMgcmVhZDp1c2VyX2lkcF90b2tlbnMgY3JlYXRlOnBhc3N3b3Jkc19jaGVja2luZ19qb2IgZGVsZXRlOnBhc3N3b3Jkc19jaGVja2luZ19qb2IgcmVhZDpjdXN0b21fZG9tYWlucyBkZWxldGU6Y3VzdG9tX2RvbWFpbnMgY3JlYXRlOmN1c3RvbV9kb21haW5zIHVwZGF0ZTpjdXN0b21fZG9tYWlucyByZWFkOmVtYWlsX3RlbXBsYXRlcyBjcmVhdGU6ZW1haWxfdGVtcGxhdGVzIHVwZGF0ZTplbWFpbF90ZW1wbGF0ZXMgcmVhZDptZmFfcG9saWNpZXMgdXBkYXRlOm1mYV9wb2xpY2llcyByZWFkOnJvbGVzIGNyZWF0ZTpyb2xlcyBkZWxldGU6cm9sZXMgdXBkYXRlOnJvbGVzIHJlYWQ6cHJvbXB0cyB1cGRhdGU6cHJvbXB0cyByZWFkOmJyYW5kaW5nIHVwZGF0ZTpicmFuZGluZyBkZWxldGU6YnJhbmRpbmcgcmVhZDpsb2dfc3RyZWFtcyBjcmVhdGU6bG9nX3N0cmVhbXMgZGVsZXRlOmxvZ19zdHJlYW1zIHVwZGF0ZTpsb2dfc3RyZWFtcyBjcmVhdGU6c2lnbmluZ19rZXlzIHJlYWQ6c2lnbmluZ19rZXlzIHVwZGF0ZTpzaWduaW5nX2tleXMgcmVhZDpsaW1pdHMgdXBkYXRlOmxpbWl0cyBjcmVhdGU6cm9sZV9tZW1iZXJzIHJlYWQ6cm9sZV9tZW1iZXJzIGRlbGV0ZTpyb2xlX21lbWJlcnMgcmVhZDplbnRpdGxlbWVudHMgcmVhZDphdHRhY2tfcHJvdGVjdGlvbiB1cGRhdGU6YXR0YWNrX3Byb3RlY3Rpb24gcmVhZDpvcmdhbml6YXRpb25zX3N1bW1hcnkgY3JlYXRlOmF1dGhlbnRpY2F0aW9uX21ldGhvZHMgcmVhZDphdXRoZW50aWNhdGlvbl9tZXRob2RzIHVwZGF0ZTphdXRoZW50aWNhdGlvbl9tZXRob2RzIGRlbGV0ZTphdXRoZW50aWNhdGlvbl9tZXRob2RzIHJlYWQ6b3JnYW5pemF0aW9ucyB1cGRhdGU6b3JnYW5pemF0aW9ucyBjcmVhdGU6b3JnYW5pemF0aW9ucyBkZWxldGU6b3JnYW5pemF0aW9ucyByZWFkOm9yZ2FuaXphdGlvbl9kaXNjb3ZlcnlfZG9tYWlucyB1cGRhdGU6b3JnYW5pemF0aW9uX2Rpc2NvdmVyeV9kb21haW5zIGNyZWF0ZTpvcmdhbml6YXRpb25fZGlzY292ZXJ5X2RvbWFpbnMgZGVsZXRlOm9yZ2FuaXphdGlvbl9kaXNjb3ZlcnlfZG9tYWlucyBjcmVhdGU6b3JnYW5pemF0aW9uX21lbWJlcnMgcmVhZDpvcmdhbml6YXRpb25fbWVtYmVycyBkZWxldGU6b3JnYW5pemF0aW9uX21lbWJlcnMgY3JlYXRlOm9yZ2FuaXphdGlvbl9jb25uZWN0aW9ucyByZWFkOm9yZ2FuaXphdGlvbl9jb25uZWN0aW9ucyB1cGRhdGU6b3JnYW5pemF0aW9uX2Nvbm5lY3Rpb25zIGRlbGV0ZTpvcmdhbml6YXRpb25fY29ubmVjdGlvbnMgY3JlYXRlOm9yZ2FuaXphdGlvbl9tZW1iZXJfcm9sZXMgcmVhZDpvcmdhbml6YXRpb25fbWVtYmVyX3JvbGVzIGRlbGV0ZTpvcmdhbml6YXRpb25fbWVtYmVyX3JvbGVzIGNyZWF0ZTpvcmdhbml6YXRpb25faW52aXRhdGlvbnMgcmVhZDpvcmdhbml6YXRpb25faW52aXRhdGlvbnMgZGVsZXRlOm9yZ2FuaXphdGlvbl9pbnZpdGF0aW9ucyByZWFkOnNjaW1fY29uZmlnIGNyZWF0ZTpzY2ltX2NvbmZpZyB1cGRhdGU6c2NpbV9jb25maWcgZGVsZXRlOnNjaW1fY29uZmlnIGNyZWF0ZTpzY2ltX3Rva2VuIHJlYWQ6c2NpbV90b2tlbiBkZWxldGU6c2NpbV90b2tlbiBkZWxldGU6cGhvbmVfcHJvdmlkZXJzIGNyZWF0ZTpwaG9uZV9wcm92aWRlcnMgcmVhZDpwaG9uZV9wcm92aWRlcnMgdXBkYXRlOnBob25lX3Byb3ZpZGVycyBkZWxldGU6cGhvbmVfdGVtcGxhdGVzIGNyZWF0ZTpwaG9uZV90ZW1wbGF0ZXMgcmVhZDpwaG9uZV90ZW1wbGF0ZXMgdXBkYXRlOnBob25lX3RlbXBsYXRlcyBjcmVhdGU6ZW5jcnlwdGlvbl9rZXlzIHJlYWQ6ZW5jcnlwdGlvbl9rZXlzIHVwZGF0ZTplbmNyeXB0aW9uX2tleXMgZGVsZXRlOmVuY3J5cHRpb25fa2V5cyByZWFkOnNlc3Npb25zIHVwZGF0ZTpzZXNzaW9ucyBkZWxldGU6c2Vzc2lvbnMgcmVhZDpyZWZyZXNoX3Rva2VucyB1cGRhdGU6cmVmcmVzaF90b2tlbnMgZGVsZXRlOnJlZnJlc2hfdG9rZW5zIGNyZWF0ZTpzZWxmX3NlcnZpY2VfcHJvZmlsZXMgcmVhZDpzZWxmX3NlcnZpY2VfcHJvZmlsZXMgdXBkYXRlOnNlbGZfc2VydmljZV9wcm9maWxlcyBkZWxldGU6c2VsZl9zZXJ2aWNlX3Byb2ZpbGVzIGNyZWF0ZTpzc29fYWNjZXNzX3RpY2tldHMgZGVsZXRlOnNzb19hY2Nlc3NfdGlja2V0cyByZWFkOmZvcm1zIHVwZGF0ZTpmb3JtcyBkZWxldGU6Zm9ybXMgY3JlYXRlOmZvcm1zIHJlYWQ6Zmxvd3MgdXBkYXRlOmZsb3dzIGRlbGV0ZTpmbG93cyBjcmVhdGU6Zmxvd3MgcmVhZDpmbG93c192YXVsdCByZWFkOmZsb3dzX3ZhdWx0X2Nvbm5lY3Rpb25zIHVwZGF0ZTpmbG93c192YXVsdF9jb25uZWN0aW9ucyBkZWxldGU6Zmxvd3NfdmF1bHRfY29ubmVjdGlvbnMgY3JlYXRlOmZsb3dzX3ZhdWx0X2Nvbm5lY3Rpb25zIHJlYWQ6Zmxvd3NfZXhlY3V0aW9ucyBkZWxldGU6Zmxvd3NfZXhlY3V0aW9ucyByZWFkOmNvbm5lY3Rpb25zX29wdGlvbnMgdXBkYXRlOmNvbm5lY3Rpb25zX29wdGlvbnMgcmVhZDpzZWxmX3NlcnZpY2VfcHJvZmlsZV9jdXN0b21fdGV4dHMgdXBkYXRlOnNlbGZfc2VydmljZV9wcm9maWxlX2N1c3RvbV90ZXh0cyBjcmVhdGU6bmV0d29ya19hY2xzIHVwZGF0ZTpuZXR3b3JrX2FjbHMgcmVhZDpuZXR3b3JrX2FjbHMgZGVsZXRlOm5ldHdvcmtfYWNscyBkZWxldGU6dmRjc190ZW1wbGF0ZXMgcmVhZDp2ZGNzX3RlbXBsYXRlcyBjcmVhdGU6dmRjc190ZW1wbGF0ZXMgdXBkYXRlOnZkY3NfdGVtcGxhdGVzIGNyZWF0ZTpjdXN0b21fc2lnbmluZ19rZXlzIHJlYWQ6Y3VzdG9tX3NpZ25pbmdfa2V5cyB1cGRhdGU6Y3VzdG9tX3NpZ25pbmdfa2V5cyBkZWxldGU6Y3VzdG9tX3NpZ25pbmdfa2V5cyByZWFkOmZlZGVyYXRlZF9jb25uZWN0aW9uc190b2tlbnMgZGVsZXRlOmZlZGVyYXRlZF9jb25uZWN0aW9uc190b2tlbnMgY3JlYXRlOnVzZXJfYXR0cmlidXRlX3Byb2ZpbGVzIHJlYWQ6dXNlcl9hdHRyaWJ1dGVfcHJvZmlsZXMgdXBkYXRlOnVzZXJfYXR0cmlidXRlX3Byb2ZpbGVzIGRlbGV0ZTp1c2VyX2F0dHJpYnV0ZV9wcm9maWxlcyByZWFkOmV2ZW50X3N0cmVhbXMgY3JlYXRlOmV2ZW50X3N0cmVhbXMgZGVsZXRlOmV2ZW50X3N0cmVhbXMgdXBkYXRlOmV2ZW50X3N0cmVhbXMgcmVhZDpldmVudF9kZWxpdmVyaWVzIHVwZGF0ZTpldmVudF9kZWxpdmVyaWVzIGNyZWF0ZTpjb25uZWN0aW9uX3Byb2ZpbGVzIHJlYWQ6Y29ubmVjdGlvbl9wcm9maWxlcyB1cGRhdGU6Y29ubmVjdGlvbl9wcm9maWxlcyBkZWxldGU6Y29ubmVjdGlvbl9wcm9maWxlcyBjcmVhdGU6Z3JvdXBfcm9sZXMgZGVsZXRlOmdyb3VwX3JvbGVzIHJlYWQ6dXNlcl9lZmZlY3RpdmVfcGVybWlzc2lvbnMgcmVhZDp1c2VyX2VmZmVjdGl2ZV9yb2xlcyByZWFkOm9yZ2FuaXphdGlvbl9tZW1iZXJfZWZmZWN0aXZlX3JvbGVzIHJlYWQ6dXNlcl9yb2xlX3NvdXJjZV9ncm91cHMgcmVhZDpvcmdhbml6YXRpb25fbWVtYmVyX3JvbGVfc291cmNlX2dyb3VwcyByZWFkOnVzZXJfcGVybWlzc2lvbl9zb3VyY2VfZ3JvdXBzIHJlYWQ6dXNlcl9wZXJtaXNzaW9uX3NvdXJjZV9yb2xlcyByZWFkOmdyb3VwX3JvbGVzIHJlYWQ6b3JnYW5pemF0aW9uX2dyb3VwcyBjcmVhdGU6b3JnYW5pemF0aW9uX2dyb3VwcyBkZWxldGU6b3JnYW5pemF0aW9uX2dyb3VwcyByZWFkOm9yZ2FuaXphdGlvbl9ncm91cF9yb2xlcyBjcmVhdGU6b3JnYW5pemF0aW9uX2dyb3VwX3JvbGVzIGRlbGV0ZTpvcmdhbml6YXRpb25fZ3JvdXBfcm9sZXMgcmVhZDpvcmdhbml6YXRpb25fY2xpZW50X2dyYW50cyBjcmVhdGU6b3JnYW5pemF0aW9uX2NsaWVudF9ncmFudHMgZGVsZXRlOm9yZ2FuaXphdGlvbl9jbGllbnRfZ3JhbnRzIGNyZWF0ZTp0b2tlbl9leGNoYW5nZV9wcm9maWxlcyByZWFkOnRva2VuX2V4Y2hhbmdlX3Byb2ZpbGVzIHVwZGF0ZTp0b2tlbl9leGNoYW5nZV9wcm9maWxlcyBkZWxldGU6dG9rZW5fZXhjaGFuZ2VfcHJvZmlsZXMgcmVhZDpjb25uZWN0aW9uc19rZXlzIHVwZGF0ZTpjb25uZWN0aW9uc19rZXlzIGNyZWF0ZTpjb25uZWN0aW9uc19rZXlzIiwiZ3R5IjoiY2xpZW50LWNyZWRlbnRpYWxzIiwiYXpwIjoiWEllWGdhZGRrQmtWb1ljUlRlWkJIVmdmdEw2TGE5NFYifQ.lg8TfbRaTab7CVqvdohyhBINKdVG4ZS6yJLb0ufFqOUaEFxqTkjNf4Qbxz-zPcee_jslrLvoX_XyoG8qgo4WW9-pCvtn2lbExiPeQwJAqUb2KjQx5aEvGYmKUXILBVL4Is7cZI3Ao_gjivX4EN0_vsrP64V6yhNELDS7C73WNK05HQ4DPSIhxohVwODrXf_Tv2rITooH232RM6Xj1F5FJGhlaynfUBKtEGMH-OJSvrkZ64RmeTn1HoJDhHI4WZgKn8d0J_xuqWMY0wn4cT-JPg1gdwqWEdH_ddZBIyypNtR09TpL85gQqgs5EbR1DcH4RUn80csm31FBMZAMXXf9FA';


// --- Step 2: Prepare the Headers Array ---
// The Management API expects an `Authorization` header with a Bearer token.
$headers = [
    'Authorization: Bearer ' . $apiToken,
];


// Assuming $json is a variable that holds the JSON string of clients
foreach(json_decode($json) as $item){
  if($item->name == "MCP Inspector"){
    $ch = curl_init();

    $deleteUrl = 'https://kaustinen.cic-demo-platform.auth0app.com/api/v2/clients/' . $item->client_id;
    echo "Preparing to DELETE: " . $deleteUrl . "<br>";

    curl_setopt($ch, CURLOPT_URL, $deleteUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

    // --- Step 3: Add the headers to your cURL request ---
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    } else {
        // You can check the HTTP status code to confirm success (e.g., 204 No Content for a successful DELETE)
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        echo "HTTP Status: " . $httpCode . " | Result: " . $result . "<br>";
    }

    curl_close($ch);

    // Your original logic to rate-limit and break the loop
  }
}

//curl -L -g -X DELETE 'https://kaustinen.cic-demo-platform.auth0app.com/api/v2/clients/:id'

?>