---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_ac6527c96d4b9793a4c77ff1e22a8906 -->
## Users - authenticate

> Example request:

```bash
curl -X POST \
    "http://localhost/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST /auth/login`


<!-- END_ac6527c96d4b9793a4c77ff1e22a8906 -->

<!-- START_c8bf91adab3a5372be7ac63a2b3c17d5 -->
## Users - register new

> Example request:

```bash
curl -X POST \
    "http://localhost/auth/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/auth/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST /auth/register`


<!-- END_c8bf91adab3a5372be7ac63a2b3c17d5 -->

<!-- START_c85938a1661fd9e3d30b9d51df1c8f11 -->
## Users - show all

> Example request:

```bash
curl -X GET \
    -G "http://localhost/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Token not provided."
}
```

### HTTP Request
`GET /users`


<!-- END_c85938a1661fd9e3d30b9d51df1c8f11 -->

<!-- START_29ff6b6636d98ecddd3de130f2c672f9 -->
## Users - get current user data

> Example request:

```bash
curl -X GET \
    -G "http://localhost/users/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/users/profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Token not provided."
}
```

### HTTP Request
`GET /users/profile`


<!-- END_29ff6b6636d98ecddd3de130f2c672f9 -->

<!-- START_23260f289f304f80f0b6608d35ef35dd -->
## Users - update name

> Example request:

```bash
curl -X PUT \
    "http://localhost/users/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/users/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT /users/update`


<!-- END_23260f289f304f80f0b6608d35ef35dd -->

<!-- START_4e63fc482957f2f77cf07a95aad6915d -->
## Bands - show all

> Example request:

```bash
curl -X GET \
    -G "http://localhost/bands" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/bands"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Token not provided."
}
```

### HTTP Request
`GET /bands`


<!-- END_4e63fc482957f2f77cf07a95aad6915d -->

<!-- START_843e1879ec071391d1e2d6183f76cf6f -->
## Bands - show by Id

> Example request:

```bash
curl -X GET \
    -G "http://localhost/bands/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/bands/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Token not provided."
}
```

### HTTP Request
`GET /bands/{id}`


<!-- END_843e1879ec071391d1e2d6183f76cf6f -->

<!-- START_426c8618f84add6099b65bdbd6e1943d -->
## Bands - show owned

> Example request:

```bash
curl -X GET \
    -G "http://localhost/bands/filter/owned" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/bands/filter/owned"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Token not provided."
}
```

### HTTP Request
`GET /bands/filter/owned`


<!-- END_426c8618f84add6099b65bdbd6e1943d -->

<!-- START_269d63a5fcb93691c325aaf62e8c9748 -->
## Bands - show all with membership

> Example request:

```bash
curl -X GET \
    -G "http://localhost/bands/filter/membership" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/bands/filter/membership"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Token not provided."
}
```

### HTTP Request
`GET /bands/filter/membership`


<!-- END_269d63a5fcb93691c325aaf62e8c9748 -->

<!-- START_c5adf759abeaa6d14fca0b04858d5286 -->
## Bands - create new

> Example request:

```bash
curl -X POST \
    "http://localhost/bands" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/bands"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST /bands`


<!-- END_c5adf759abeaa6d14fca0b04858d5286 -->

<!-- START_127e33f020d8126d972cc0b63f67b47e -->
## Bands - delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost/bands/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/bands/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE /bands/{bandId}`


<!-- END_127e33f020d8126d972cc0b63f67b47e -->

<!-- START_b6073fb015f6471b93f119a773c76616 -->
## Bands - update

> Example request:

```bash
curl -X PUT \
    "http://localhost/bands" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/bands"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT /bands`


<!-- END_b6073fb015f6471b93f119a773c76616 -->

<!-- START_b1bd8d405cf9699e4a3955038bc7b21c -->
## Bands - leave

> Example request:

```bash
curl -X GET \
    -G "http://localhost/bands/1/leave/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/bands/1/leave/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Token not provided."
}
```

### HTTP Request
`GET /bands/{bandId}/leave/{userId}`


<!-- END_b1bd8d405cf9699e4a3955038bc7b21c -->

<!-- START_e2b2a97d8e5e248c0ff3c098919a157e -->
## Files - show all

> Example request:

```bash
curl -X GET \
    -G "http://localhost/files" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/files"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Token not provided."
}
```

### HTTP Request
`GET /files`


<!-- END_e2b2a97d8e5e248c0ff3c098919a157e -->

<!-- START_773fd2c72cc1d80df6a4d1f4dec893c6 -->
## Files - show file by Id

> Example request:

```bash
curl -X GET \
    -G "http://localhost/files/download/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/files/download/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Token not provided."
}
```

### HTTP Request
`GET /files/download/{id}`


<!-- END_773fd2c72cc1d80df6a4d1f4dec893c6 -->

<!-- START_7c9f55d711891604837c44bf87888c4f -->
## Files - show by folder Id

> Example request:

```bash
curl -X GET \
    -G "http://localhost/files/folder/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/files/folder/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Token not provided."
}
```

### HTTP Request
`GET /files/folder/{id}`


<!-- END_7c9f55d711891604837c44bf87888c4f -->

<!-- START_8cc736e861dd22f2836888fe7216689e -->
## Files - show all owned by current user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/files/owned" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/files/owned"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Token not provided."
}
```

### HTTP Request
`GET /files/owned`


<!-- END_8cc736e861dd22f2836888fe7216689e -->

<!-- START_88bc57b8168de72e5ba618765eca91d0 -->
## Files - upload new

> Example request:

```bash
curl -X POST \
    "http://localhost/files" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/files"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST /files`


<!-- END_88bc57b8168de72e5ba618765eca91d0 -->

<!-- START_be0886895ab149a2b7b0ed772501be16 -->
## Files - delete by Id

> Example request:

```bash
curl -X DELETE \
    "http://localhost/files/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/files/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE /files/{id}`


<!-- END_be0886895ab149a2b7b0ed772501be16 -->

<!-- START_701ee05464be9985c2d6d12832b7d6f4 -->
## Files - clean local storage

> Example request:

```bash
curl -X DELETE \
    "http://localhost/files/admin/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/files/admin/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE /files/admin/all`


<!-- END_701ee05464be9985c2d6d12832b7d6f4 -->

<!-- START_4054c1d2b853ee746d042fdb0388d3f1 -->
## Files - upload file to band folder

> Example request:

```bash
curl -X POST \
    "http://localhost/files/bandFile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/files/bandFile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST /files/bandFile`


<!-- END_4054c1d2b853ee746d042fdb0388d3f1 -->

<!-- START_f71304d92c7e1a832c995b2e9b82c1d3 -->
## Invitations - show all owned by user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/invitations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/invitations"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Token not provided."
}
```

### HTTP Request
`GET /invitations`


<!-- END_f71304d92c7e1a832c995b2e9b82c1d3 -->

<!-- START_7e382befa991246f253a7fb872022dbb -->
## Invitations - delete by Id

> Example request:

```bash
curl -X DELETE \
    "http://localhost/invitations/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/invitations/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE /invitations/{id}`


<!-- END_7e382befa991246f253a7fb872022dbb -->

<!-- START_8f863d60c113f4d7f8e451d8b5b20075 -->
## Invitations - create new

> Example request:

```bash
curl -X POST \
    "http://localhost/invitations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/invitations"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST /invitations`


<!-- END_8f863d60c113f4d7f8e451d8b5b20075 -->

<!-- START_c635ae7bf002be5455dfa5e9f33a7e05 -->
## Invitations - accept

> Example request:

```bash
curl -X POST \
    "http://localhost/invitations/accept" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/invitations/accept"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST /invitations/accept`


<!-- END_c635ae7bf002be5455dfa5e9f33a7e05 -->

<!-- START_6f245b905aca65ac6baf717ee3cfe206 -->
## Folders - Show all

> Example request:

```bash
curl -X GET \
    -G "http://localhost/folders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/folders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Token not provided."
}
```

### HTTP Request
`GET /folders`


<!-- END_6f245b905aca65ac6baf717ee3cfe206 -->

<!-- START_aa496609ed3952d3ded928bc634ed4a2 -->
## Folders - show by Id

> Example request:

```bash
curl -X GET \
    -G "http://localhost/folders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/folders/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Token not provided."
}
```

### HTTP Request
`GET /folders/{id}`


<!-- END_aa496609ed3952d3ded928bc634ed4a2 -->

<!-- START_a1aeeb23d78d9876330b5b7277ec557b -->
## Folders - create new

> Example request:

```bash
curl -X POST \
    "http://localhost/folders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/folders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST /folders`


<!-- END_a1aeeb23d78d9876330b5b7277ec557b -->

<!-- START_e5bb8a7fb3a7547c7e394622332c31f4 -->
## Folders - update

> Example request:

```bash
curl -X PUT \
    "http://localhost/folders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/folders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT /folders`


<!-- END_e5bb8a7fb3a7547c7e394622332c31f4 -->

<!-- START_84a9f54b997bd015f735c309c8250471 -->
## Folders - delete by Id

> Example request:

```bash
curl -X DELETE \
    "http://localhost/folders/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/folders/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE /folders/{id}`


<!-- END_84a9f54b997bd015f735c309c8250471 -->

<!-- START_8b3e70dccf4180be6ac44b24c54761fe -->
## Dump api-docs.json content endpoint.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/docs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/docs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
null
```

### HTTP Request
`GET /docs`


<!-- END_8b3e70dccf4180be6ac44b24c54761fe -->

<!-- START_7c0fe8d9df5e66a29beebfb7432be376 -->
## Display Swagger API page.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/documentation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/documentation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET /api/documentation`


<!-- END_7c0fe8d9df5e66a29beebfb7432be376 -->

<!-- START_0455b2e98586c3809d37ebd3a12f1942 -->
## /swagger-ui-assets/{asset}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/swagger-ui-assets/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/swagger-ui-assets/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
null
```

### HTTP Request
`GET /swagger-ui-assets/{asset}`


<!-- END_0455b2e98586c3809d37ebd3a12f1942 -->

<!-- START_487b5c769d135e3b433454d6f12ba543 -->
## Display Oauth2 callback pages.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/oauth2-callback" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/oauth2-callback"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET /api/oauth2-callback`


<!-- END_487b5c769d135e3b433454d6f12ba543 -->


