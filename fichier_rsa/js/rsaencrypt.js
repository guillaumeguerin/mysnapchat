function encryptData(input)
{
        
var pem="-----BEGIN PUBLIC KEY-----\
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDfmlc2EgrdhvakQApmLCDOgP0n\
NERInBheMh7J/r5aU8PUAIpGXET/8+kOGI1dSYjoux80AuHvkWp1EeHfMwC/SZ9t\
6rF4sYqV5Lj9t32ELbh2VNbE/7QEVZnXRi5GdhozBZtS1gJHM2/Q+iToyh5dfTaA\
U8bTnLEPMNC1h3qcUQIDAQAB\
-----END PUBLIC KEY-----";

var key = RSA.getPublicKey(pem);

return RSA.encrypt(input, key);

}
